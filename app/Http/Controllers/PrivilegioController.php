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
        //
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
        //dd($request->all());
        $privilegio = Privilegio::create([
            'Funcion'=> $request->input('Funcion'),
        ]);

        $roles = $request->get('rol');
        //dd($roles);
        foreach( $roles as $rol => $key) {
            $rol_privilegio = RolPrivilegio::create([
                'RolID'=> $key,
                'PrivilegioID'=> $privilegio->id
            ]);
        }
        return redirect()->route('privilegios.create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
