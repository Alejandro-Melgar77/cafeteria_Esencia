<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index() {
        $metodos = MetodoPago::all();
        return view('metodo_pago.index', compact('metodos'));
    }

    public function create() {
        return view('metodo_pago.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|unique:metodos_pago,nombre',
            'saldo' => 'nullable|numeric|min:0',
        ]);
        MetodoPago::create($request->all());
        return redirect()->route('metodos_pago.index')->with('success', 'Método de pago registrado.');
    }

    public function edit(MetodoPago $metodo) {
        return view('metodo_pago.edit', compact('metodo'));
    }

    public function update(Request $request, MetodoPago $metodo) {
        $request->validate([
            'nombre' => 'required|string|unique:metodos_pago,nombre,' . $metodo->id,
            'saldo' => 'nullable|numeric|min:0',
        ]);
        $metodo->update($request->all());
        return redirect()->route('metodos_pago.index')->with('success', 'Método actualizado.');
    }

    public function destroy(MetodoPago $metodo) {
        $metodo->delete();
        return back()->with('success', 'Método eliminado.');
    }
}
