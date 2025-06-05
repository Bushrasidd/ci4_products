<?php

namespace App\Controllers;
use App\Models\CartModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->cart = new CartModel();
        helper(['url', 'form']);
        session();
    }

    public function index()
    {
        $sessionId = session_id();
        $data['items'] = $this->cart->getCartItems($sessionId);
        $data['total'] = $this->cart->getTotal($sessionId);
        return view('cart_view', $data);
    }

    public function add()
    {
        $sessionId = session_id();

        $this->cart->save([
            'product_id' => $this->request->getPost('product_id'),
            'name'       => $this->request->getPost('name'),
            'price'      => $this->request->getPost('price'),
            'img_path'   => $this->request->getPost('img_path'),
            'quantity'   => 1,
            'session_id' => $sessionId,
        ]);

        return redirect()->to('/cart');
    }

    public function remove($productId)
    {
        $sessionId = session_id();
        $this->cart->removeItem($sessionId, $productId);
        return redirect()->to('/cart');
    }

    public function clear()
    {
        $sessionId = session_id();
        $this->cart->clearCart($sessionId);
        return redirect()->to('/cart');
    }
}
