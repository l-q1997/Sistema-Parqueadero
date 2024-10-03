<?php
namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('routes.create');
    }

    // Guardar el nuevo registro
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origin' => 'required|string|max:255',  
            'destination' => 'required|string|max:255', 
            'distance' => 'required|numeric', 
            'duration' => 'required|string|max:255', 
        ]);

        Route::create($validatedData);

        return redirect()->route('routes.index')->with('success', 'Ruta creada con éxito.');
    }

    // Mostrar un registro específico
    public function show($id)
    {
        $route = Route::findOrFail($id);
        return view('routes.show', compact('route'));
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $route = Route::findOrFail($id);
        return view('routes.edit', compact('route'));
    }

    // Actualizar un registro
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'duration' => 'required|string|max:255',
        ]);

        Route::whereId($id)->update($validatedData);

        return redirect()->route('routes.index')->with('success', 'Ruta actualizada con éxito.');
    }

    // Eliminar un registro
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Ruta eliminada con éxito.');
    }
}
