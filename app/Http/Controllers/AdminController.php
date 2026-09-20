<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class AdminController extends Controller
{
    public function index()
    {
        $pending = Order::with('items')->where('payment_status', 'pending')
            ->orderBy('created_at')
            ->get();

        $history = Order::with('items')->where('payment_status', 'paid')
            ->orderBy('confirmed_at', 'desc')
            ->get();

        return view('admin.dashboard', compact('pending', 'history'));
    }
    public function validateOrder(Order $order)
    {
        $order->update([
            'payment_status' => 'paid',
            'confirmed_at' => now(),
        ]);

        return back();
    }

    public function home()
    {
        return view('admin.home');
    }
}
