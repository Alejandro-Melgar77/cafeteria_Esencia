<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    public function index()
    {
        $mesas = Mesa::paginate(10);
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        return view('mesas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nro' => 'required|integer|unique:mesas|min:1',
            'Capacidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($request) {
                Mesa::create($request->all());
            });

            return redirect()->route('mesas.index')
                ->with('success', 'Mesa creada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear mesa: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $mesa = Mesa::findOrFail($id);
        return view('mesas.show', compact('mesa'));
    }

    public function edit($id)
    {
        $mesa = Mesa::findOrFail($id);
        return view('mesas.edit', compact('mesa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nro' => 'required|integer|unique:mesas,Nro,' . $id . '|min:1',
            'Capacidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $mesa = Mesa::findOrFail($id);
                $mesa->update($request->all());
            });

            return redirect()->route('mesas.index')
                ->with('success', 'Mesa actualizada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $mesa = Mesa::findOrFail($id);
                $mesa->delete();
            });

            return redirect()->route('mesas.index')
                ->with('success', 'Mesa eliminada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar: ' . $e->getMessage());
        }
    }
}