<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id', // Asegurarse de que el cliente exista
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        Order::whereId($id)->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado con éxito.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pedido eliminado con éxito.');
    }
}
