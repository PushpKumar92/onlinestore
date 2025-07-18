<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
 public function index()
    {
        $user = Auth::user();

        // Agar user ki cartItems relationship hai to load karo, warna empty collection
        $cartItems = $user->cartItems ?? collect();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty.');
        }

        // Subtotal calculate
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $total = $subtotal;

        return view('frontend.checkout', compact('user', 'cartItems', 'subtotal', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $order = new Order();
        $order->user_id = $user->id;
        $order->billing_name = $request->fname . ' ' . $request->lname;
        $order->billing_email = $request->email;
        $order->billing_phone = $request->phone;
        $order->billing_address = $request->address;
        $order->billing_country = $request->country;
        $order->billing_city = $request->city;
        $order->billing_zip = $request->zip;
        $order->payment_method = $request->payment_method;
        $order->total_amount = $request->total;
        $order->save();

        $cartItems = Cart::where('user_id', $user->id)->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('index')->with('success', 'Order placed successfully!');
    }
}
