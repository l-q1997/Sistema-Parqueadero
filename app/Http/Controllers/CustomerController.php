<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email', 
            'phone' => 'required|string|max:20',
        ]);

        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Cliente creado con éxito.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id, // Nos aseguramos de que el email sea único, excepto el actual
            'phone' => 'required|string|max:20',
        ]);

        Customer::whereId($id)->update($validatedData);

        return redirect()->route('customers.index')->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
