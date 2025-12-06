<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Category;

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
  $categories = Category::all();
    // Pass all required variables to the view
    return view('frontend.checkout', compact('cartItems', 'total', 'user','categories'));
}


  public function placeOrder(Request $request)
{
    // FIX: use correct guard
    $user = Auth::guard('user')->user();

    if (!$user) {
        return redirect()->route('login')
            ->with('error', 'Please login before placing an order.');
    }

    $userId = $user->id;

    // Validate request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|min:10|max:15',
        'address' => 'required|string|max:500',
        'country' => 'required|string|max:100',
        'city' => 'required|string|max:100',
        'zip' => 'required|string|max:10',
        'payment_method' => 'required|string|in:cod,online',
        'total' => 'required|numeric|min:0',
    ]);

    // Get cart items
    $cartItems = CartItem::where('user_id', $userId)->with('product')->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.show')->with('error', 'Your cart is empty!');
    }

    // Calculate total
    $calculatedTotal = 0;
    foreach ($cartItems as $item) {
        $price = $item->product->discount_price && $item->product->discount_price < $item->product->price
            ? $item->product->discount_price
            : $item->product->price;

        $calculatedTotal += $price * $item->quantity;
    }

    // Verify frontend total
    if (abs($calculatedTotal - $validated['total']) > 0.01) {
        return back()->withErrors(['total' => 'Total amount mismatch. Please try again.'])->withInput();
    }

    DB::beginTransaction();

    try {
        // Create order
        $order = Order::create([
            'user_id'        => $userId,
            'order_number'   => $this->generateOrderNumber(),
            'billing_name'   => $validated['name'],
            'billing_email'  => $validated['email'],
            'billing_phone'  => $validated['phone'],
            'billing_address'=> $validated['address'],
            'billing_country'=> $validated['country'],
            'billing_city'   => $validated['city'],
            'billing_zip'    => $validated['zip'],
            'payment_method' => $validated['payment_method'],
            'total_amount'   => $calculatedTotal,
            'status'         => 'pending',
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            $price = $cartItem->product->discount_price && $cartItem->product->discount_price < $cartItem->product->price
                ? $cartItem->product->discount_price
                : $cartItem->product->price;

            OrderItem::create([
                'order_id'    => $order->id,
                'product_id'  => $cartItem->product_id,
                'product_name'=> $cartItem->product->name,
                'quantity'    => $cartItem->quantity,
                'price'       => $price,
                'total'       => $price * $cartItem->quantity,
            ]);
        }

        // Clear cart
        CartItem::where('user_id', $userId)->delete();

        DB::commit();

        return redirect()->route('thankyou', ['order' => $order->order_number])
            ->with('success', 'Order placed successfully!');

    } catch (\Exception $e) {
        DB::rollBack();

        return back()->withErrors([
            'error' => 'Order failed: ' . $e->getMessage()
        ]);
    }
}
  /**
     * Show thank you page
     */
    public function thankYou($orderNumber)
    {
        $user = Auth::user();
        
        $order = Order::where('order_number', $orderNumber)
            ->where('user_id', $user->id)
            ->with('orderItems')
            ->firstOrFail();
        
        return view('frontend.thankyou', compact('order'));
    }
    
    /**
     * Generate unique order number
     */
    private function generateOrderNumber()
    {
        do {
            $orderNumber = 'ORD-' . strtoupper(uniqid());
        } while (Order::where('order_number', $orderNumber)->exists());
        
        return $orderNumber;
    }
}