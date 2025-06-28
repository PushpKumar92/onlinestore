<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
 // Show cart page
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }

  public function addToCart($id, Request $request)
    {
       $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    $cart[$id] = [
        'name' => $product->name,
        'quantity' => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
        'price' => $product->price,
        'image' => 'uploads/products/' . $product->image, // ✅ Correct image path
    ];

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}
public function update(Request $request)
{
    if ($request->id && $request->quantity) {
        $cart = session()->get('cart');

        $cart[$request->id]['quantity'] = $request->quantity;

        session()->put('cart', $cart);

        $item_total = $cart[$request->id]['price'] * $cart[$request->id]['quantity'];
        $cart_total = 0;
        foreach ($cart as $item) {
            $cart_total += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'item_total' => $item_total,
            'cart_total' => $cart_total
        ]);
    }
}
public function remove($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
}
}