<?php

namespace App\Services;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WishlistService
{
    public function getWishlistByUserId($userId)
    {
        return Cache::remember("wishlist_user_{$userId}", 600, function () use ($userId) {
            return Wishlist::where('user_id', $userId)->get();
        });
    }

    public function addToWishlist(array $data)
    {
        return Wishlist::create($data);
    }

    public function removeFromWishlist($id)
    {
        $wishlistItem = Wishlist::findOrFail($id);
        $wishlistItem->delete();
        Cache::forget("wishlist_user_{$wishlistItem->user_id}");
        return true;
    }
}
