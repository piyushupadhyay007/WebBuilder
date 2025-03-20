<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Discount;
use App\Models\Tax;
use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommonController extends Controller
{
    public function getShipments()
    {
        return Inertia::render('Shipments/Index', [
            'shipments' => Shipment::latest()->get()
        ]);
    }

    public function updateShipment(Request $request, $id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->update($request->only(['status', 'estimated_delivery']));

        return back()->with('success', 'Shipment updated successfully');
    }

    public function getDiscounts()
    {
        return Inertia::render('Discounts/Index', [
            'discounts' => Discount::where('status', 'active')->get()
        ]);
    }

    public function getTaxes()
    {
        return Inertia::render('Taxes/Index', [
            'taxes' => Tax::where('status', 'active')->get()
        ]);
    }

    public function getUserAddresses($userId)
    {
        return Inertia::render('Addresses/Index', [
            'addresses' => Address::where('user_id', $userId)->get()
        ]);
    }
}
