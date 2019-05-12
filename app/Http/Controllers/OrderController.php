<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function active() {
        $user = Auth::user();

        return Order::getActiveOrder($user->id);
    }

    public function addItem(Request $request, Order $order)
    {
        $kind = $request->input('kind');
        $size = $request->input('size');
        $items = $request->input('items');

        return $order->addItem($kind, $size, $items);
    }

    public function getOrder(Order $order)
    {
        return $order->load('items', 'items.products');
    }
}
