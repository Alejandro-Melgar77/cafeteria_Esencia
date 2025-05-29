<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Container\Attributes\DB as AttributesDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Usuario::clientes()
            ->with('rol')
            ->paginate(10);
        // dd($clientes);
        return view("clientes.index", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
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
                $cliente = $request->all();
                $rol = DB::table('roles')->where('Cargo', 'Cliente')->first();
                $cliente['RolID'] = $rol->id;
                Usuario::create($cliente);
            });
            return redirect()->route('clientes.index')
                ->with('success', 'Cliente creado correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear cliente: ' . $e->getMessage())
                ->withInput();
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
        $cliente = Usuario::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Nombre' => 'required|max:100',
            'Email' => 'required|email|max:255|unique:usuarios,email,' . $id,
            'Telefono' => 'required|max:15',
        ]);
        try {
            DB::transaction(function () use ($request, $id) {
                $cliente = Usuario::findOrFail($id);
                $cliente->update($request->all());
            });
            return redirect()->route('clientes.index')
                ->with('success', 'Cliente actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar cliente: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Usuario::findOrFail($id);
            $cliente->delete();
            return redirect()->route('clientes.index')
                ->with('success', 'Cliente eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar cliente: ' . $e->getMessage());
        }
    }
}
