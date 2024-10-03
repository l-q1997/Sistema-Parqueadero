<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        return view('deliveries.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id', // Asegurarse de que el pedido exista
            'driver_id' => 'required|exists:drivers,id', // Asegurarse de que el conductor exista
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        Delivery::create($validatedData);

        return redirect()->route('deliveries.index')->with('success', 'Entrega creada con éxito.');
    }

    public function show($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('deliveries.show', compact('delivery'));
    }

    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);
        return view('deliveries.edit', compact('delivery'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'driver_id' => 'required|exists:drivers,id',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        Delivery::whereId($id)->update($validatedData);

        return redirect()->route('deliveries.index')->with('success', 'Entrega actualizada con éxito.');
    }

    public function destroy($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        return redirect()->route('deliveries.index')->with('success', 'Entrega eliminada con éxito.');
    }
}
