<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Producto::all();
        return view("productos.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validar
        $validated = $request->validate([
            "nombre" => ["required","string"],
            "fecha_vco" => ["required","date"],
            "costo" => ["required"],
            "stock"=> ["required","integer"],
        ]);
        $inventario = Inventario::create($validated);
        
        $producto = Producto::create([
            "id" => $inventario->id,
            "Precio_venta" => $request->Precio_venta,
            "Costo_produccion" => $request->Costo_produccion,
            "Porcentaje_utilidad" => $request->Porcentaje_utilidad,
        ]);
        return redirect()->route("inventarios.index")->with("success", "Se he creado correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
