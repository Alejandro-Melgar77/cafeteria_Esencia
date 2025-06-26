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
        $metodosPago = MetodoPago::paginate(10);
        return view('metodo_pago.index', compact('metodosPago'));
    }

    public function create() {
        return view('metodo_pago.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:metodos_pago,nombre',
            'saldo' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string'
        ]);
        MetodoPago::create($request->all());
        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago registrado correctamente.');
    }

    public function show(MetodoPago $metodoPago) {
        return view('metodo_pago.show', compact('metodoPago'));
    }   

    public function edit(MetodoPago $metodoPago) {
        return view('metodo_pago.edit', compact('metodoPago'));
    }

    public function update(Request $request, MetodoPago $metodoPago) {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:metodos_pago,nombre,' . $metodoPago->id,
            'saldo' => 'nullable|numeric|min:0',
            'descripcion' => 'nullable|string'
        ]);
        
        $metodoPago->update($request->all());
        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago actualizado correctamente.');
    }

    public function destroy(MetodoPago $metodoPago) {
        $metodoPago->delete();
        return back()->with('success', 'Método de pago eliminado correctamente.');
    }
}
