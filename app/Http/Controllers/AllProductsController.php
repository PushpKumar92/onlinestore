<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AllProductsController extends Controller
{
    public function allproducts()
    {
        // Get all products from the database
        $products = Product::paginate(12)->withQueryString();

         $categories = Category::all();

        // Pass all products to the view
        return view('frontend.allproducts', compact('products','categories'));
    }
}
