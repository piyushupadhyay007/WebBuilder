<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ReviewService
{
    public function getAllReviews()
    {
        return Cache::remember('reviews_all', 600, function () {
            return Review::all();
        });
    }

    public function getReviewById($id)
    {
        return Cache::remember("review_{$id}", 600, function () use ($id) {
            return Review::findOrFail($id);
        });
    }

    public function createReview(array $data)
    {
        return Review::create($data);
    }

    public function updateReview($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        Cache::forget("review_{$id}");
        return $review;
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        Cache::forget("review_{$id}");
        return true;
    }
}
