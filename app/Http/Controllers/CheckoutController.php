<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function updateOrder(Request $request, Order $order)
    {
        $order->is_active = false;
        $order->is_completed = true;
        $order->save();

        return $order;
    }

}
