<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $products = Product::query()
            ->when($query, function($q, $query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
                 // optional: search by SKU
            })
            ->paginate(20);

        return view('frontend.result', compact('products', 'query'));
    }
}
