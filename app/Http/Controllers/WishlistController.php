<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $wishlists = Wishlist::with('product')->where('user_id', Auth::id())->get();
        } else {
            $sessionWishlist = Session::get('wishlist', []);
            $wishlists = Product::whereIn('id', $sessionWishlist)->get();
        }

        return view('frontend.wishlist', compact('wishlists'));
    }

    public function remove($id)
    {
        if (Auth::check()) {
            Wishlist::where('user_id', Auth::id())->where('product_id', $id)->delete();
        } else {
            $wishlist = session()->get('wishlist', []);
            $wishlist = array_filter($wishlist, fn ($pid) => $pid != $id);
            session()->put('wishlist', $wishlist);
        }

        return redirect()->back()->with('success', 'Removed from wishlist');
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        if (Auth::check()) {
            $userId = Auth::id();

            $exists = Wishlist::where('user_id', $userId)
                ->where('product_id', $id)
                ->exists();

            if (!$exists) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                ]);
            }

        } else {
            $wishlist = session()->get('wishlist', []);
            if (!in_array($id, $wishlist)) {
                $wishlist[] = $id;
                session()->put('wishlist', $wishlist);
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Added to wishlist']);
    }

    public function count()
    {
        if (Auth::check()) {
            $count = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $wishlist = session()->get('wishlist', []);
            $count = count($wishlist);
        }

        return response()->json(['count' => $count]);
    }
}
