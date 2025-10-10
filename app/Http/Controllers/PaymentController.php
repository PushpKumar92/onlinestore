<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;



class PaymentController extends Controller
{
 // Show cart page
   public function showPaymentPage($orderId)
{
    $order = Order::findOrFail($orderId);
    return view('frontend.payment', compact('order'));
}


}