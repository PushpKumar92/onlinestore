<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $wishlistItems = Wishlist::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $wishlistProductIds = Session::get('wishlist', []);
            $wishlistItems = Product::whereIn('id', $wishlistProductIds)->get();
        }

        return view('frontend.wishlist', [
            'wishlistItems' => $wishlistItems
        ]);
    }

    public function add($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $exists = Wishlist::where('user_id', $userId)->where('product_id', $id)->exists();

            if (!$exists) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                ]);
            }

            return response()->json(['message' => 'Added to Wishlist']);
        } else {
            $wishlist = Session::get('wishlist', []);

            if (!in_array($id, $wishlist)) {
                $wishlist[] = $id;
                Session::put('wishlist', $wishlist);
            }

            return response()->json(['message' => 'Added to Wishlist (Guest)']);
        }
    }

    public function remove($id)
    {
        if (Auth::check()) {
            Wishlist::where('user_id', Auth::id())->where('product_id', $id)->delete();
        } else {
            $wishlist = Session::get('wishlist', []);
            $wishlist = array_filter($wishlist, function ($item) use ($id) {
                return $item != $id;
            });
            Session::put('wishlist', $wishlist);
        }

        return redirect()->back()->with('success', 'Removed from Wishlist');
    }

    public function count()
    {
        if (Auth::check()) {
            $count = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $count = count(Session::get('wishlist', []));
        }

        return response()->json(['count' => $count]);
    }
}