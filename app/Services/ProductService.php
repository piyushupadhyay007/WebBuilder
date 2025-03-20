<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function getAllProducts()
    {
        return Cache::remember('products_all', 600, function () {
            return Product::all();
        });
    }

    public function getProductById($id)
    {
        return Cache::remember("product_{$id}", 600, function () use ($id) {
            return Product::findOrFail($id);
        });
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        Cache::forget("product_{$id}");
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Cache::forget("product_{$id}");
        return true;
    }
}
