<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::paginate(10);
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Cargo' => 'required|string|max:40',
        ]);
        try {
            $rol = $request->all();
            Rol::create($rol);
            return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('danger', 'Error al crear el rol: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);
        $privilegios = DB::select("select privilegios.Funcion
                                        from privilegios, roles, roles_privilegios
                                        where privilegios.id = roles_privilegios.PrivilegioID 
                                        and roles.id = roles_privilegios.RolID
                                        and roles.id = ?", [$id]);

        return view('roles.show', compact('rol', 'privilegios'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol = Rol::find($id);
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Cargo' => 'required|string|max:40',
        ]);
        try {
            $rol = Rol::find($id);
            $rol->update($request->all());
            return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('danger', 'Error al actualizar el rol: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $rol = Rol::find($id);
            $rol->delete();
            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('danger', 'Error al eliminar el rol: ' . $e->getMessage());
        }
    }
}
