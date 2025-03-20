<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public function getAllPayments()
    {
        return Cache::remember('payments_all', 600, function () {
            return Payment::all();
        });
    }

    public function getPaymentById($id)
    {
        return Cache::remember("payment_{$id}", 600, function () use ($id) {
            return Payment::findOrFail($id);
        });
    }

    public function processPayment(array $data)
    {
        try {
            $payment = Payment::create($data);
            return $payment;
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return null;
        }
    }
}
