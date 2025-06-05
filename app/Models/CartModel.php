<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart_items';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['product_id', 'quantity', 'session_id', 'name', 'price', 'img_path'];
    protected $useTimestamps = true;

    public function getCartItems($sessionId)
    {
        return $this->where('session_id', $sessionId)->findAll();
    }

    public function updateQuantity($sessionId, $productId, $quantity)
    {
        return $this->where([
            'session_id' => $sessionId,
            'product_id' => $productId
        ])->set(['quantity' => $quantity])->update();
    }

    public function removeItem($sessionId, $productId)
    {
        return $this->where([
            'session_id' => $sessionId,
            'product_id' => $productId
        ])->delete();
    }

    public function clearCart($sessionId)
    {
        return $this->where('session_id', $sessionId)->delete();
    }

    public function getTotal($sessionId)
    {
        $items = $this->where('session_id', $sessionId)->findAll();
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
} 