<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:10|max:1000',
        ]);

        // Check if user already reviewed this product
        $existingReview = Review::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this product!'
            ], 422);
        }

        $review = Review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'user_name' => $request->user_name,
            'rating' => $request->rating,
            'review' => $request->review,
            'is_approved' => false // Admin approval required
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully! It will be visible after admin approval.',
            'review' => $review
        ]);
    }

    public function getProductReviews($productId)
    {
        $reviews = Review::where('product_id', $productId)
            ->where('is_approved', true)
            ->with('user')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'reviews' => $reviews
        ]);
    }
}