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
        $roles = Rol::all();
        return view('roles.index')->with('roles',$roles);
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
         $rol = $request->all();
         Rol::create($rol);
         return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol=Rol::find($id);
        $privilegios=DB::select("select privilegio.Funcion
                                        from privilegio, rol, rol_privilegio
                                        where privilegio.id = rol_privilegio.PrivilegioID 
                                        and rol.id = rol_privilegio.RolID
                                        and rol.id = ?", [$id]); 

        return view('roles.show',compact('rol', 'privilegios'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $rol=Rol::find($id);
        return view('roles.edit',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol=Rol::find($id);
         $rol->update($request->all());
         return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $rol=Rol::find($id);
         $rol->delete();
         return redirect()->route('roles.index');
    }
}
