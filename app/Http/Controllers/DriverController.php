<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Driver::create($validatedData);

        return redirect()->route('drivers.index')->with('success', 'Conductor creado con éxito.');
    }

    public function show($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.show', compact('driver'));
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        Driver::whereId($id)->update($validatedData);

        return redirect()->route('drivers.index')->with('success', 'Conductor actualizado con éxito.');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Conductor eliminado con éxito.');
    }
}
