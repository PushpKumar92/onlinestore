<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddCartController extends Controller
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

    // Remove Item from Cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    // Update Cart Quantity
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->input('quantity', $cart[$id]['quantity']);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    // Clear Cart
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
}
