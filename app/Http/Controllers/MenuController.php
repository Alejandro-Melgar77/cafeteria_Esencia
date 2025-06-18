<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        //$inventarios = Inventario::all();
        $inventarios = Inventario::with(['productos', 'ingredientes'])->get();
        return view('menus.create', compact('inventarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'inventarios' => 'required|array|min:1',
            'inventarios.*.id' => 'required|exists:inventarios,id',
            'inventarios.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $menu = Menu::create(['fecha' => $validated['fecha']]);

                $inventariosData = [];
                foreach ($validated['inventarios'] as $id => $data) {
                    // Verificar si el checkbox está marcado
                    if (isset($data['id']) && $data['id'] == $id) {
                        $inventariosData[$id] = ['cantidad' => $data['cantidad']];
                    }
                }

                $menu->inventarios()->attach($inventariosData);
            });

            return redirect()->route('menus.index')->with('success', 'Menú creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                   ->with('danger', 'Error al crear menú: ' . $e->getMessage())
                   ->withInput();
        }
    }

    public function show($id)
    {
        $menu = Menu::with('inventarios')->findOrFail($id);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::with('inventarios')->findOrFail($id);
        $inventarios = Inventario::all();
    
        $selected = [];
        foreach ($menu->inventarios as $inventario) {
            $selected[$inventario->id] = [
                'id' => $inventario->id,
                'cantidad' => $inventario->pivot->cantidad
            ];
        }
    
        return view('menus.edit', compact('menu', 'inventarios', 'selected'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'inventarios' => 'required|array|min:1',
            'inventarios.*.id' => 'required|exists:inventarios,id',
            'inventarios.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {
                $menu = Menu::findOrFail($id);
                $menu->update(['fecha' => $validated['fecha']]);

                $inventariosData = [];
                foreach ($validated['inventarios'] as $id => $data) {
                    if (isset($data['id']) && $data['id'] == $id) {
                        $inventariosData[$id] = ['cantidad' => $data['cantidad']];
                    }
                }

                $menu->inventarios()->sync($inventariosData);
            });

            return redirect()->route('menus.index')->with('success', 'Menú actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                   ->with('danger', 'Error al actualizar menú: ' . $e->getMessage())
                   ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $menu = Menu::findOrFail($id);
                $menu->inventarios()->detach();
                $menu->delete();
            });

            return redirect()->route('menus.index')
                ->with('success', 'Menú eliminado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar menú: ' . $e->getMessage());
        }
    }
}