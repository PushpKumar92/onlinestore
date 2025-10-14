<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // Show all orders
    public function adminIndex()
    {
        $orders = Order::with('items')->latest()->paginate(15);
        return view('admin.order.index', compact('orders'));
    }

    // Show single order details
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    // Update order status
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.show', $order)
                         ->with('success', 'Order status updated successfully.');
    }

    // Delete order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')
                         ->with('success', 'Order deleted successfully.');
    }
}
