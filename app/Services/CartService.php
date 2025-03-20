<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CartService
{
    public function getCartByUserId($userId)
    {
        return Cache::remember("cart_user_{$userId}", 600, function () use ($userId) {
            return Cart::where('user_id', $userId)->get();
        });
    }

    public function addToCart(array $data)
    {
        return Cart::create($data);
    }

    public function updateCartItem($id, array $data)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->update($data);
        Cache::forget("cart_user_{$cartItem->user_id}");
        return $cartItem;
    }

    public function removeCartItem($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        Cache::forget("cart_user_{$cartItem->user_id}");
        return true;
    }
}
