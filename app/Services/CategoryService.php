<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    public function getAllCategories()
    {
        return Cache::remember('categories_all', 600, function () {
            return Category::all();
        });
    }

    public function getCategoryById($id)
    {
        return Cache::remember("category_{$id}", 600, function () use ($id) {
            return Category::findOrFail($id);
        });
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        Cache::forget("category_{$id}");
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Cache::forget("category_{$id}");
        return true;
    }
}
