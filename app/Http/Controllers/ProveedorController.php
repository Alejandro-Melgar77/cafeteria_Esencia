<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'email' => 'required|email|unique:proveedores|max:255',
            'negocio' => 'required|max:100',
            'telefono' => 'required|max:15'
        ]);

        try {
            DB::transaction(function () use ($request) {
                Proveedor::create($request->all());
            });

            return redirect()->route('proveedores.index')
                ->with('success', 'Proveedor creado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear proveedor: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'email' => 'required|email|max:255|unique:proveedores,email,' . $id,
            'negocio' => 'required|max:100',
            'telefono' => 'required|max:15'
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $proveedor = Proveedor::findOrFail($id);
                $proveedor->update($request->all());
            });

            return redirect()->route('proveedores.index')
                ->with('success', 'Proveedor actualizado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $proveedor = Proveedor::findOrFail($id);
                $proveedor->delete();
            });

            return redirect()->route('proveedores.index')
                ->with('success', 'Proveedor eliminado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar: ' . $e->getMessage());
        }
    }
}
