<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display wishlist page
     */
    public function index(Request $request)
    {
        
        if (Auth::check()) {
            // For logged-in users
            $wishlists = Wishlist::with('product')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        } else {
            // For guest users
            $wishlistIds = $request->session()->get('wishlist', []);
            $wishlists = Product::whereIn('id', $wishlistIds)
                ->latest()
                ->get();
        }

         $categories=Category::all();

        return view('frontend.wishlist', compact('wishlists','categories'));
    }

    /**
     * Add product to wishlist
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $productId = $request->product_id;

        if (Auth::check()) {
            // Logged-in user
            $exists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->exists();

            if ($exists) {
                return response()->json([
                    'status' => 'exists',
                    'message' => 'Product already in wishlist'
                ]);
            }

            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);

            return response()->json([
                'status' => 'added',
                'message' => 'Product added to wishlist'
            ]);
        } else {
            // Guest user - use session
            $wishlist = $request->session()->get('wishlist', []);

            if (in_array($productId, $wishlist)) {
                return response()->json([
                    'status' => 'exists',
                    'message' => 'Product already in wishlist'
                ]);
            }

            $wishlist[] = $productId;
            $request->session()->put('wishlist', $wishlist);

            return response()->json([
                'status' => 'added',
                'message' => 'Product added to wishlist'
            ]);
        }
    }

    /**
     * Remove product from wishlist
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->first();

            if ($wishlist) {
                $wishlist->delete();
                return response()->json([
                    'status' => 'removed',
                    'message' => 'Product removed from wishlist'
                ]);
            }
        } else {
            // Guest user
            $wishlist = $request->session()->get('wishlist', []);
            
            if (($key = array_search($id, $wishlist)) !== false) {
                unset($wishlist[$key]);
                $request->session()->put('wishlist', array_values($wishlist));
                
                return response()->json([
                    'status' => 'removed',
                    'message' => 'Product removed from wishlist'
                ]);
            }
        }

        return response()->json([
            'status' => 'not_found',
            'message' => 'Product not found in wishlist'
        ], 404);
    }

    /**
     * Get wishlist count
     */
    public function getCount(Request $request)
    {
        if (Auth::check()) {
            $count = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $count = count($request->session()->get('wishlist', []));
        }

        return response()->json(['count' => $count]);
    }

    /**
     * Get wishlist product IDs
     */
    public function getItems(Request $request)
    {
        if (Auth::check()) {
            $items = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();
        } else {
            $items = $request->session()->get('wishlist', []);
        }

        return response()->json(['wishlist_items' => $items]);
    }
}