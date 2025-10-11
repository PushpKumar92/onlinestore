<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show Cart Page
    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('frontend.cart', compact('cart', 'total'));
    }

    // Add to Cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $discount = $product->discount ?? 0;
        $finalPrice = ($discount > 0)
            ? round($product->price - ($product->price * $discount / 100), 2)
            : $product->price;

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->input('quantity', 1);
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $finalPrice,
                'original_price' => $product->price,
                'discount_applied' => $discount,
                'quantity' => $request->input('quantity', 1),
                'description' => $product->description ?? '',
            ];
        }

        session()->put('cart', $cart);

        $cartCount = collect($cart)->sum('quantity');

        return response()->json([
            'cart_count' => $cartCount,
            'message' => 'Product added to cart successfully.'
        ]);
    }

    // ✅ Update Cart Quantity (AJAX compatible)
   public function update(Request $request)
{
    $id = $request->id;
    $quantity = $request->quantity;

    $cart = session()->get('cart');

    if(isset($cart[$id])) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
    }

    // Recalculate totals
    $item = $cart[$id];
    $original = $item['price'];
    $discount = isset($item['discount']) ? (float)$item['discount'] : 0;
    $final = $discount > 0 ? round($original - ($original * $discount / 100), 2) : $original;
    $item_total = $final * $quantity;

    $cart_total = 0;
    foreach ($cart as $cartItem) {
        $orig = $cartItem['price'];
        $disc = isset($cartItem['discount']) ? (float)$cartItem['discount'] : 0;
        $finalPrice = $disc > 0 ? round($orig - ($orig * $disc / 100), 2) : $orig;
        $cart_total += $finalPrice * $cartItem['quantity'];
    }

    return response()->json([
        'item_total' => $item_total,
        'cart_total' => $cart_total,
    ]);
}

    // Remove Item
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    // Clear Cart
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}
