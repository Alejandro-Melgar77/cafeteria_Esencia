<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use App\Models\Rol;
use App\Models\RolPrivilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DB::table('privilegios');

        if ($request->filled('buscar')) {
            $query->where('Funcion', 'LIKE', '%' . $request->buscar . '%');
        }

        $privilegios = $query->paginate(10)->withQueryString();

        return view('privilegios.index', compact('privilegios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('privilegios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Funcion' => 'required|max:100',
            'Caracteristica' => 'required|max:100',
            'rol' => 'array',
        ]);
        try {
            $privilegio = Privilegio::create([
                'Funcion' => $request->Funcion . " " . $request->Caracteristica,
            ]);

            $roles = $request->get('rol', []);
            foreach ($roles as $rol_id) {
                RolPrivilegio::create([
                    'RolID' => $rol_id,
                    'PrivilegioID' => $privilegio->id
                ]);
            }
            return redirect()->route('privilegios.index')->with('success', 'Privilegio creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('privilegios.create')->with('danger', 'Error al crear el privilegio: ' . $e->getMessage());
        }
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
        $privilegio = Privilegio::find($id);
        $roles = Rol::all();
        $rol_privilegios = RolPrivilegio::where('PrivilegioID', $id)->pluck('RolID');
        // dd($rol_privilegios);
        return view('privilegios.edit', compact('privilegio', 'roles', 'rol_privilegios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $privilegio = Privilegio::find($id);
            $privilegio->update([
                'Funcion' => $request->Funcion . " " . $request->Caracteristica,
            ]);

            // Eliminar privilegios existentes
            RolPrivilegio::where('PrivilegioID', $id)->delete();

            // Crear nuevos privilegios
            $roles = $request->get('rol');
            foreach ($roles as $rol => $key) {
                RolPrivilegio::create([
                    'RolID' => $key,
                    'PrivilegioID' => $privilegio->id
                ]);
            }
            return redirect()->route('privilegios.index')->with('success', 'Privilegio actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('privilegios.edit', ['id' => $id])->with('danger', 'Error al actualizar el privilegio: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $rol_privilegios = DB::table('roles_privilegios')
        //     ->where('PrivilegioID', $id)
        //     ->get();
        // dd($rol_privilegios);
        try {
            RolPrivilegio::where('PrivilegioID', $id)->delete();
            $privilegio = Privilegio::findOrFail($id);
            $privilegio->delete();

            return redirect()->route('privilegios.index')->with('success', 'Privilegio eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('privilegios.index')->with('danger', 'Error al eliminar el privilegio: ' . $e->getMessage());
        }
    }
}
