<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\CartItem;


class CartController extends Controller
{
 // Show cart page
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }

public function addToCart(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Calculate price once when adding to cart
    $discount = $product->discount ?? 0;
    $finalPrice = ($discount > 0)
        ? round($product->price - ($product->price * $discount / 100), 2)
        : $product->price;

    if (Auth::check()) {
        $userId = Auth::id();

        $cartItem = CartItem::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_image' => $product->image,
                'price' => $finalPrice,
                'quantity' => 1,
            ]);
        }

        $cartCount = CartItem::where('user_id', $userId)->sum('quantity');
    } else {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $finalPrice,
                'quantity' => 1,
                'description' => $product->description ?? '',
                'original_price' => $product->price,
                'discount' => $discount,
            ];
        }

        session()->put('cart', $cart);
        $cartCount = collect($cart)->sum('quantity');
    }

    return response()->json([
        'cart_count' => $cartCount
    ]);
}

public function update(Request $request)
{
    $cart = session()->get('cart');
    $id = $request->id;
    $quantity = $request->quantity;

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);

        $itemTotal = $cart[$id]['price'] * $quantity;

        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'item_total' => $itemTotal,
            'cart_total' => $cartTotal
        ]);
    }

    return response()->json(['error' => 'Item not found'], 404);
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