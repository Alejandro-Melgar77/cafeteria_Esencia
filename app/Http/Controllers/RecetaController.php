<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Producto;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::with(['producto.inventarios', 'ingredientes.inventarios'])->paginate(10);
        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $ingredientes = Ingrediente::all();
        return view('recetas.create', compact('productos', 'ingredientes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nro' => 'required|unique:recetas',
            'producto_id' => 'required|exists:productos,id',
            'ingredientes' => 'required|array|min:1',
            'ingredientes.*.id' => 'required|exists:ingredientes,id',
            'ingredientes.*.cantidad' => 'required|numeric|min:0.1'
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $receta = Receta::create([
                    'nro' => $validated['nro'],
                    'producto_id' => $validated['producto_id']
                ]);

                $ingredientesData = [];
                foreach ($validated['ingredientes'] as $ingrediente) {
                    $ingredientesData[$ingrediente['id']] = ['cantidad' => $ingrediente['cantidad']];
                }

                $receta->ingredientes()->sync($ingredientesData);
            });

            return redirect()->route('recetas.index')
                ->with('success', 'Receta creada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear receta: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $receta = Receta::with(['producto.inventarios', 'ingredientes.inventarios'])
            ->findOrFail($id);

        return view('recetas.show', compact('receta'));
    }

    public function edit($id)
    {
        $receta = Receta::with(['ingredientes'])->findOrFail($id);
        $productos = Producto::all();
        $ingredientes = Ingrediente::all();

        return view('recetas.edit', compact('receta', 'productos', 'ingredientes'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nro' => 'required|unique:recetas,nro,' . $id,
            'producto_id' => 'required|exists:productos,id',
            'ingredientes' => 'required|array|min:1',
            'ingredientes.*.id' => 'required|exists:ingredientes,id',
            'ingredientes.*.cantidad' => 'required|numeric|min:0.1'
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {
                $receta = Receta::findOrFail($id);

                $receta->update([
                    'nro' => $validated['nro'],
                    'producto_id' => $validated['producto_id']
                ]);

                $ingredientesData = [];
                foreach ($validated['ingredientes'] as $ingrediente) {
                    $ingredientesData[$ingrediente['id']] = ['cantidad' => $ingrediente['cantidad']];
                }

                $receta->ingredientes()->sync($ingredientesData);
            });

            return redirect()->route('recetas.index')
                ->with('success', 'Receta actualizada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar receta: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $receta = Receta::findOrFail($id);
                $receta->ingredientes()->detach();
                $receta->delete();
            });

            return redirect()->route('recetas.index')
                ->with('success', 'Receta eliminada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Error al eliminar receta: ' . $e->getMessage());
        }

    }


}
