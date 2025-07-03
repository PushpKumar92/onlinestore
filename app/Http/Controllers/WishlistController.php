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

    public function add(Request $request)
    {
        $productId = $request->product_id;

        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->exists();

            if (!$exists) {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                ]);
            }

        } else {
            $wishlist = session()->get('wishlist', []);
            if (!in_array($productId, $wishlist)) {
                $wishlist[] = $productId;
                session()->put('wishlist', $wishlist);
            }
        }

        return response()->json(['message' => 'Added to wishlist']);
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

    public function count()
    {
        $count = Auth::check()
            ? Wishlist::where('user_id', Auth::id())->count()
            : count(session()->get('wishlist', []));

        return response()->json(['count' => $count]);
    }
}