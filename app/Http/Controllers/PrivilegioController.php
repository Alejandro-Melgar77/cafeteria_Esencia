<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use App\Models\Rol;
use App\Models\RolPrivilegio;
use Illuminate\Http\Request;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privilegios = Privilegio::all();
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
        try {
            // dd($request->all());
            $privilegio = Privilegio::create([
                'Funcion' => $request->input('Funcion'),
            ]);

            $roles = $request->get('rol');
            //dd($roles);
            foreach ($roles as $rol => $key) {
                $rol_privilegio = RolPrivilegio::create([
                    'RolID' => $key,
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
                'Funcion' => $request->input('Funcion'),
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
        try {
            foreach (RolPrivilegio::where('PrivilegioID', $id)->get() as $rol_privilegio) {
                $rol_privilegio->delete();
            }
            $privilegio = Privilegio::find($id);
            $privilegio->delete();
            return redirect()->route('privilegios.index')->with('success', 'Privilegio eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('privilegios.index')->with('danger', 'Error al eliminar el privilegio: ' . $e->getMessage());
        }
    }
}
