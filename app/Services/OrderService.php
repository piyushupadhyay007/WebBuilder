<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function getAllOrders()
    {
        return Cache::remember('orders_all', 600, function () {
            return Order::all();
        });
    }

    public function getOrderById($id)
    {
        return Cache::remember("order_{$id}", 600, function () use ($id) {
            return Order::findOrFail($id);
        });
    }

    public function createOrder(array $data)
    {
        return Order::create($data);
    }

    public function updateOrder($id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        Cache::forget("order_{$id}");
        return $order;
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        Cache::forget("order_{$id}");
        return true;
    }
}
