<?php

namespace App\Http\Controllers;

use App\Models\NotaDeSalida;
use App\Models\DetalleDeSalida;
use App\Models\Producto;
use App\Models\Ingrediente;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotaDeSalidaController extends Controller
{
    public function __construct()
    {
        // Puedes activar middleware si quieres control de acceso
        // $this->middleware('auth');
    }

    public function create()
    {
        $productos = Producto::all();
        $ingredientes = Ingrediente::all();
        return view('nota_salida.create', compact('productos', 'ingredientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'items' => 'required|array|min:1',
           // 'items.*.tipo' => 'required|in:producto,ingrediente',
            'items.*.id' => 'required|integer',
            'items.*.cantidad' => 'required|integer|min:1',
        ]);

        // Validar que no se intente dar de baja más de stock
        foreach ($request->items as $item) {
            $inventario = Inventario::where('id', $item['id'])
                ->first();

            if (!$inventario || $inventario->stock < $item['cantidad']) {
                return redirect()->back()->withErrors([
                    "Stock insuficiente para el item ID {$item['id']} ."
                ])->withInput();
            }
        }

        // Crear nota de salida
        $nota = NotaDeSalida::create([
            'codigo' => 'NS-' . time(),
            'fecha' => Carbon::now(),
            'descripcion' => $request->descripcion,
            'usuario_id' => Auth::id(),
        ]);

        // Crear detalles y actualizar stock
        foreach ($request->items as $item) {
            DetalleDeSalida::create([
                'notas_de_salida_id' => $nota->id,
                //'tipo' => $item['tipo'],
                'inventario_id' => $item['id'],
                'cantidad' => $item['cantidad'],
            ]);

            // Restar del stock
            Inventario::where('id', $item['id'])
                ->decrement('stock', $item['cantidad']);
        }

        // Redirigir a descarga PDF del comprobante
        return redirect()->route('nota_salida.show_pdf', $nota->codigo);
    }

    public function showPDF($codigo)
    {
        $nota = NotaDeSalida::where('codigo', $codigo)->with('detalles')->firstOrFail();

        $pdf = Pdf::loadView('nota_salida.pdf', compact('nota'));
        return $pdf->download("NotaSalida_{$codigo}.pdf");
    }
}

