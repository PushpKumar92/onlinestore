<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WatchlistController extends Controller
{
     public function index()
    {
        if (Auth::check()) {
            $watchlistItems = Watchlist::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $watchlistProductIds = Session::get('watchlist', []);
            $watchlistItems = Product::whereIn('id', $watchlistProductIds)->get();
        }

        // ✅ THIS IS WHAT FIXES YOUR ERROR
        return view('frontend.watchlist', [
            'watchlistItems' => $watchlistItems
        ]);
    }


    public function add($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $exists = Watchlist::where('user_id', $userId)->where('product_id', $id)->exists();

            if (!$exists) {
                Watchlist::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                ]);
            }

            return response()->json(['message' => 'Added to Watchlist']);
        } else {
            $watchlist = Session::get('watchlist', []);

            if (!in_array($id, $watchlist)) {
                $watchlist[] = $id;
                Session::put('watchlist', $watchlist);
            }

            return response()->json(['message' => 'Added to Watchlist (Guest)']);
        }
    }

    public function remove($id)
    {
        if (Auth::check()) {
            Watchlist::where('user_id', Auth::id())->where('product_id', $id)->delete();
        } else {
            $watchlist = Session::get('watchlist', []);
            $watchlist = array_filter($watchlist, function ($item) use ($id) {
                return $item != $id;
            });
            Session::put('watchlist', $watchlist);
        }

        return redirect()->back()->with('success', 'Removed from Watchlist');
    }

    public function count()
    {
        if (Auth::check()) {
            $count = Watchlist::where('user_id', Auth::id())->count();
        } else {
            $count = count(Session::get('watchlist', []));
        }

        return response()->json(['count' => $count]);
    }
}