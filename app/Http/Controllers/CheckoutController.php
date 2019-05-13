<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function updateOrder(Request $request, Order $order)
    {
        $order->is_active = false;
        $order->is_completed = true;
        $order->save();

        $user = Auth::user();

        Mail::to($user->email)->send(
            new \App\Mail\PizzaEmail($user->f_name . ' ' . $user->s_name)
        );

        User::where('role', '=', 'admin')
            ->each(function (User $admin) use ($user) {
                Mail::to($admin->email)->send(
                    new \App\Mail\AdminEmail($user->f_name . ' ' . $user->s_name)
                );
        });

        return $order;
    }

}
