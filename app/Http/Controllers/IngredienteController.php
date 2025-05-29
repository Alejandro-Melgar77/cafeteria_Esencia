<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredienteController extends Controller
{

    public function index()
    {
        $ingredientes = Ingrediente::paginate(10);
        return view('ingredientes.index', compact('ingredientes'));
    }

    public function create()
    {
        return view('ingredientes.create');
    }
    public function store(Request $request)
    {
        $inventarioValidated = $request->validate([
            "nombre" => ["required", "string", "max:100"],
            "costo" => ["required", "numeric", "min:0"],
            "stock" => ["required", "integer", "min:0"],
        ]);
        $productoValidated = $request->validate([
            "Unidad_Medida" => ["required", "string", "max:20"],
            "Costo_Unitario" => ["required", "numeric", "min:0"],
            "Costo_Promedio" => ["required", "numeric", "min:0"],
        ]);

        try {
            DB::transaction(function () use ($request) {
                $inventario = Inventario::create([
                    'nombre' => $request->nombre,
                    'fecha_vco' => $request->fecha_vco,
                    'costo' => $request->costo,
                    'stock' => $request->stock,
                ]);
                $ingrediente = Ingrediente::create([
                    'id' => $inventario->id,
                    'Unidad_Medida' => $request->Unidad_Medida,
                    'Costo_Unitario' => $request->Costo_Unitario,
                    'Costo_Promedio' => $request->Costo_Promedio,
                ]);
            });

            return redirect()->route('ingredientes.index')->with('success', 'Ingrediente creado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $ingrediente = Ingrediente::findOrFail($id);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    public function update(Request $request, $id)
    {
        $inventarioValidated = $request->validate([
            "nombre" => ["required", "string", "max:100"],
            "costo" => ["required", "numeric", "min:0"],
            "stock" => ["required", "integer", "min:0"],
        ]);
        $productoValidated = $request->validate([
            "Unidad_Medida" => ["required", "string", "max:20"],
            "Costo_Unitario" => ["required", "numeric", "min:0"],
            "Costo_Promedio" => ["required", "numeric", "min:0"],
        ]);

        try {
            $ingrediente = Ingrediente::findOrFail($id);

            DB::transaction(function () use ($request, $ingrediente) {
                $ingrediente->inventarios->update([
                    'nombre' => $request->nombre,
                    'fecha_vco' => $request->fecha_vco,
                    'costo' => $request->costo,
                    'stock' => $request->stock,
                ]);

                $ingrediente->update([
                    'Unidad_Medida' => $request->Unidad_Medida,
                    'Costo_Unitario' => $request->Costo_Unitario,
                    'Costo_Promedio' => $request->Costo_Promedio,
                ]);
            });

            return redirect()->route('ingredientes.index')->with('success', 'Ingrediente actualizado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $ingrediente = Ingrediente::findOrFail($id);
            return view('ingredientes.show', compact('ingrediente'));

        } catch (\Exception $e) {
            return redirect()->route('ingredientes.index')->with('danger', 'Ingrediente no encontrado: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $ingrediente = Ingrediente::findOrFail($id);
                $ingrediente->inventarios->delete(); // Elimina el inventario relacionado
            });

            return redirect()->route('ingredientes.index')->with('success', 'Ingrediente eliminado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error al eliminar: ' . $e->getMessage());
        }
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
