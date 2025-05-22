<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Inventario;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{

    public function create() {
        return view('ingredientes.create');
    }
    public function store(Request $request) {
        
        $validated = $request->validate([
            "nombre" => ["required","string"],
            "fecha_vco" => ["required","date"],
            "costo" => ["required"],
            "stock"=> ["required","integer"],
        ]);
        $inventario = Inventario::create($validated);
        
        $ingrediente = Ingrediente::create([
            "id" => $inventario->id,
            "Unidad_Medida" => $request->Unidad_Medida,
            "Costo_Unitario" => $request->Costo_Unitario,
            "Costo_Promedio" => $request->Costo_Promedio,
        ]);
        return redirect()->route("inventarios.index")->with("success", "Se he creado correctamente.");
    }
    public function calcularPromedio()
    {
        // $costo = ["50", "65"];
        // $costo_unitario = calcularCostoUnitario($costo);
        // $cantidad = cantidadPorStock($costo_unitario);
        // if ($cantidad == 0) {
        //     return ërror;
        // } else {
        //     $promedio = sumaStock($costo_unitario) / $cantidad;
        // }
    }
}
