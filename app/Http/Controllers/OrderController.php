<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();

        return Inertia::render('Orders/Index', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string'
        ]));

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function processPayment(Request $request, $orderId)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'transaction_id' => 'required|string|unique:payments'
        ]);

        Payment::create([
            'order_id' => $orderId,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            // 'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'status' => 'completed'
        ]);

        return back()->with('success', 'Payment successful');
    }
}
