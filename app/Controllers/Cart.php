<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use CodeIgniter\HTTP\ResponseInterface;

use CodeIgniter\Controller;

class Cart extends Controller
{
    protected $cartModel;
    protected $productModel;
    protected $session;

    public function index()
    {
        return view('pages/home');
    }

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->session = session();
        helper(['url', 'form']);
    }

    public function add()
    {
        if ($this->request->isAJAX()) {
            $productId = $this->request->getPost('product_id');
            $sessionId = session_id();

            // Get product details
            $product = $this->productModel->find($productId);
            if (!$product) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Product not found'
                ]);
            }

            // Check if product already exists in cart
            $existingItem = $this->cartModel->where([
                'session_id' => $sessionId,
                'product_id' => $productId
            ])->first();

            if ($existingItem) {
                // Update quantity
                $this->cartModel->updateQuantity($sessionId, $productId, $existingItem['quantity'] + 1);
            } else {
                // Add new item
                $this->cartModel->insert([
                    'product_id' => $productId,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'img_path' => $product['img_path'],
                    'quantity' => 1,
                    'session_id' => $sessionId
                ]);
            }

            $cartCount = $this->getCartCount();
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Product added to cart successfully',
                'cartCount' => $cartCount
            ]);
        }
    }

    public function getCartCount()
    {
        $sessionId = session_id();
        $items = $this->cartModel->getCartItems($sessionId);
        $count = 0;
        foreach ($items as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }

    public function view()
    {
        $sessionId = session_id();
        $data['items'] = $this->cartModel->getCartItems($sessionId);
        $data['total'] = $this->cartModel->getTotal($sessionId);
        return view('pages/cart', $data);
    }

    public function remove($productId = null)
    {
        $sessionId = session_id();
        
        if ($productId === null) {
            $productId = $this->request->getPost('product_id');
        }

        $this->cartModel->removeItem($sessionId, $productId);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Product removed from cart',
                'cartCount' => $this->getCartCount()
            ]);
        }

        return redirect()->to(base_url('cart'));
    }

    public function updateQuantity()
    {
        if ($this->request->isAJAX()) {
            $productId = $this->request->getPost('product_id');
            $quantity = $this->request->getPost('quantity');
            $sessionId = session_id();

            $this->cartModel->updateQuantity($sessionId, $productId, $quantity);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Cart updated successfully',
                'cartCount' => $this->getCartCount()
            ]);
        }
    }

    public function clear()
    {
        $sessionId = session_id();
        $this->cartModel->clearCart($sessionId);

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Cart cleared successfully',
                'cartCount' => 0
            ]);
        }

        return redirect()->to(base_url('cart'));
    }
} 