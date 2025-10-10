<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
public function index(Request $request)
{
    // Get the logged-in user
    $user = Auth::user();

    $user = Auth::guard('user')->user();
    $cartItems = session()->get('cart', []);

    // Calculate total amount
   $total = 0;
foreach ($cartItems as $item) {
    $itemPrice = $item['discount_price'] ?? $item['price']; // use discount_price if available
    $total += $itemPrice * $item['quantity'];
}

    // Pass all required variables to the view
    return view('frontend.checkout', compact('cartItems', 'total', 'user'));
}
  public function placeOrder(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required|string',
        'country' => 'required|string',
        'city' => 'required|string',
        'zip' => 'required|string',
        'payment_method' => 'required|string',
        'total' => 'required|numeric',
    ]);

    $order = new Order();
    $order->user_id = $user->id;
    $order->billing_name = $request->name;
    $order->billing_email = $request->email;
    $order->billing_phone = $request->phone;
    $order->billing_address = $request->address;
    $order->billing_country = $request->country;
    $order->billing_city = $request->city;
    $order->billing_zip = $request->zip;
    $order->payment_method = $request->payment_method;
    $order->total_amount = $request->total;
    $order->status = 'pending';
    $order->order_number = 'ORD-' . strtoupper(uniqid());
    $order->save();

    $cartItems = CartItem::where('user_id', $user->id)->get();
    foreach ($cartItems as $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }

    CartItem::where('user_id', $user->id)->delete();

    return redirect()->route('payment.page', ['order' => $order->id]);
}
}
