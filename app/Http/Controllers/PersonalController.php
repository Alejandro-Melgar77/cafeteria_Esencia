<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Usuario::personal()
            ->with('rol')
            ->paginate(10);
        return view("personal.index", compact("personal"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|max:100',
            'Email' => 'required|email|unique:usuarios|max:255',
            'Telefono' => 'required|max:15',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $personal = $request->all();
                $rol = DB::table('roles')->where('Cargo', 'Personal')->first();
                $personal['RolID'] = $rol->id;
                Usuario::create($personal);
            });
            return redirect()->route('personal.index')
                ->with('success', 'Personal creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear personal: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personal = Usuario::findOrFail($id);
        return view('personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personal = Usuario::findOrFail($id);
        return view('personal.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nombre' => 'required|max:100',
            'Email' => 'required|email|unique:usuarios,email,' . $id . '|max:255',
            'Telefono' => 'required|max:15',
        ]);

        try {
            DB::transaction(function () use ($request, $id) {
                $personal = Usuario::findOrFail($id);
                $personal->update($request->all());
            });
            return redirect()->route('personal.index')
                ->with('success', 'Personal actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar personal: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $personal = Usuario::findOrFail($id);
            $personal->delete();
            return redirect()->route('personal.index')
                ->with('success', 'Personal eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar personal: ' . $e->getMessage());
        }
    }
}
