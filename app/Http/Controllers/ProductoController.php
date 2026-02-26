<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Producto::all();

        return reponse()->json([
        'massage' => 'Lista de productos',
        'data' => $producto
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer'
    ]);

    $producto = Producto::create($validated);

    return response()->json([
        'massege' => 'Producto creado correctamente',
        'data' => $producto
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
         return $producto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
    'nombre' => 'required|string|max:255',
    'precio' => 'required|numeric|min:0',
    'stock' => 'required|integer|min:0'
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}
