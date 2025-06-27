<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => 1,
            "image" => $product->image
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Product added to cart!');
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