<?php

namespace App\Http\Controllers;

use App\Models\NotaDeCompra;
use App\Models\DetalleDeCompra;
use App\Models\Producto;
use App\Models\Ingrediente;
use App\Models\Inventario;
use App\Models\Proveedor;
use App\Models\MetodoPago;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotaDeCompraController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('can:admin-personal');
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $ingredientes = Ingrediente::all();
        $metodos_pago = MetodoPago::all();
        return view('nota_compra.create', compact('proveedores', 'productos', 'ingredientes', 'metodos_pago'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'items' => 'required|array|min:1',
        ]);

        $metodoPago = MetodoPago::findOrFail($request->metodo_pago_id);

        

        // Calcular monto total automáticamente
        $montoTotal = 0;
        foreach ($request->items as $item) {
            $montoTotal += $item['precio_unitario'] * $item['cantidad'];
        }

        if ($metodoPago->saldo < $montoTotal) {
            return redirect()->back()->withErrors(['saldo' => 'Saldo insuficiente en el método de pago seleccionado.']);
        }

        $nota = NotaDeCompra::create([
            'codigo' => 'NC-' . time(),
            'fecha' => Carbon::now(),
            'monto_total' => $montoTotal,
            'proveedor_id' => $request->proveedor_id,
            'metodo_pago_id' => $request->metodo_pago_id,
            'usuario_id' => Auth::id()
        ]);

        foreach ($request->items as $item) {
            // $modelo = $item['tipo'] === 'producto' ? Producto::find($item['id']) : Ingrediente::find($item['id']);

            if (!$item) {
                return redirect()->back()->withErrors(["El {$item} no existe. Regístrelo antes de continuar."]);
            }

            DetalleDeCompra::create([
                'nota_de_compra_id' => $nota->id,
                //'tipo' => $item['tipo'],
                'inventario_id' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario']
            ]);

            Inventario::updateOrCreate(
                ['id' => $item['id']],
                ['stock' => DB::raw("stock + {$item['cantidad']}")]
            );
        }

        // Restar monto total al método de pago
        $metodoPago->saldo -= $request->monto_total;
        $metodoPago->save();

        // Bitacora::create([
        //     'usuario_id' => Auth::id(),
        //     'accion' => 'Registró una nueva nota de compra: ' . $nota->codigo . ' usando método de pago: ' . $metodoPago->nombre,
        //     'modulo' => 'Nota de Compra',
        //     'fecha' => now()
        // ]);

        return redirect()->route('nota_compra.show_pdf', $nota->codigo);
    }

    public function showPDF($codigo)
    {
        $nota = NotaDeCompra::where('codigo', $codigo)->with('detalles')->firstOrFail();
        $pdf = PDF::loadView('nota_compra.pdf', compact('nota'));
        return $pdf->download("NotaCompra_{$codigo}.pdf");
    }

    public function reporte(Request $request)
    {
        $query = NotaDeCompra::query();

        if ($request->filled('desde'))
            $query->where('fecha', '>=', $request->desde);

        if ($request->filled('hasta'))
            $query->where('fecha', '<=', $request->hasta);

        if ($request->filled('producto_id')) {
            $query->whereHas('detalles', function ($q) use ($request) {
                $q->where('item_id', $request->producto_id);
            });
        }

        if ($request->filled('monto_min'))
            $query->where('monto_total', '>=', $request->monto_min);

        if ($request->filled('monto_max'))
            $query->where('monto_total', '<=', $request->monto_max);

        $notas = $query->with('proveedor')->get();

        $pdf = Pdf::loadView('nota_compra.reporte_pdf', compact('notas'));
        return $pdf->download("Reporte_NotasCompra.pdf");
    }
}
