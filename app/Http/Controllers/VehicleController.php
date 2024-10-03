<?php

namespace App\Http\Controllers;

use App\Models\Vehicle; 
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('vehicles.create');
    }

    // Guardar el nuevo registro
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer', 
            'status' => 'required|in:active,inactive', 
        ]);

        Vehicle::create($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehículo creado con éxito.');
    }

    // Mostrar un registro específico
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    // Actualizar un registro
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'capacity' => 'required|integer', 
            'status' => 'required|in:active,inactive', 
        ]);

        Vehicle::whereId($id)->update($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehículo actualizado con éxito.');
    }

    // Eliminar un registro
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehículo eliminado con éxito.');
    }
}
