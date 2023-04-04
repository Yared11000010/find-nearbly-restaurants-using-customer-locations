<?php

namespace App\Http\Controllers;

use App\Models\OrderFood;
use App\Models\DeliveryBoy;
use Illuminate\Http\Request;

class FoodOrderController extends Controller
{
    //
    public function index()
    {
        $foodOrders = OrderFood::all();
        $deliveryBoys = DeliveryBoy::all();

        return view('food-orders.index', compact('foodOrders', 'deliveryBoys'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $foodOrder = new OrderFood;
        $foodOrder->name = $validatedData['name'];
        $foodOrder->address = $validatedData['address'];
        $foodOrder->status = 'pending';
        $foodOrder->save();

        return redirect()->route('foodorders');
    }

    public function assign(Request $request, $id)
    {
        $validatedData = $request->validate([
            'delivery_boy_id' => 'required|exists:delivery_boys,id',
        ]);

        $foodOrder = OrderFood::findOrFail($id);
        $foodOrder->delivery_boy_id = $validatedData['delivery_boy_id'];
        $foodOrder->save();

        return redirect()->route('foodorders');
    }
}