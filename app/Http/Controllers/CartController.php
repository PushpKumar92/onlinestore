<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
     public function cart() {
        return view('frontend.cart');
    }
    public function add(Request $request)
    {
         $productId = $request->input('product_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Product added to cart!']);
    }


public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if ($request->action == 'increase') {
        $cart[$id]['quantity']++;
    } elseif ($request->action == 'decrease') {
        $cart[$id]['quantity']--;
        if ($cart[$id]['quantity'] < 1) {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);
    return redirect()->back();
}
public function remove($id)
{
    $cart = session()->get('cart');
    unset($cart[$id]);
    session()->put('cart', $cart);
    return redirect()->back();
}
public function clear()
{
    session()->forget('cart');
    return redirect()->back();
}
}