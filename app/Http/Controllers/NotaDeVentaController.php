<?php

namespace App\Http\Controllers;

use App\Models\NotaDeVenta;
use App\Models\MetodoPago;
use App\Models\Usuario; 
use App\Models\Inventario; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaDeVentaController extends Controller
{
    public function index()
    {
        $notasDeVenta = NotaDeVenta::with(['usuario', 'metodoPago'])
            ->withCount('inventarios')
            ->withSum('inventarios as total_items', 'detalles_de_venta.cantidad')
            ->paginate(10);

        return view('nota_venta.index', compact('notasDeVenta'));
    }
    public function create()
    {
        $metodosPago = MetodoPago::all();
        $usuarios = Usuario::all();
        $inventarios = Inventario::with('productos')->get(); // Cargar relación con productos

        return view('nota_venta.create', compact(
            'metodosPago',
            'usuarios',
            'inventarios'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'importe' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'inventarios' => 'required|array|min:1',
            'inventarios.*.id' => 'required|exists:inventarios,id',
            'inventarios.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $nota = NotaDeVenta::create([
                    'importe' => $validated['importe'],
                    'fecha' => $validated['fecha'],
                    'metodo_pago_id' => $validated['metodo_pago_id'],
                    'usuario_id' => $validated['usuario_id']
                ]);

                $detalles = [];
                foreach ($validated['inventarios'] as $item) {
                    $detalles[$item['id']] = ['cantidad' => $item['cantidad']];
                }

                $nota->inventarios()->attach($detalles);
            });

            return redirect()->route('nota_venta.index')
                ->with('success', 'Nota de venta creada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $notaDeVenta = NotaDeVenta::with([
            'usuario.rol', 
            'metodoPago',
            'inventarios.productos' // Cargar inventarios y sus productos asociados
        ])->findOrFail($id);
        
        return view('nota_venta.show', compact('notaDeVenta'));
    }
    public function edit($id)
    {
        $notaDeVenta = NotaDeVenta::with('inventarios')->findOrFail($id);
        $metodosPago = MetodoPago::all();
        $usuarios = Usuario::all();
        $inventarios = Inventario::with('productos')->get(); // Cargar relación con productos

        $selected = [];
        foreach ($notaDeVenta->inventarios as $inventario) {
            $selected[$inventario->id] = [
                'id' => $inventario->id,
                'cantidad' => $inventario->pivot->cantidad
            ];
        }

        return view('nota_venta.edit', compact(
            'notaDeVenta',
            'metodosPago',
            'usuarios',
            'inventarios',
            'selected'
        ));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'importe' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'metodo_pago_id' => 'required|exists:metodos_pago,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'inventarios' => 'required|array|min:1',
            'inventarios.*.id' => 'required|exists:inventarios,id',
            'inventarios.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {
                $nota = NotaDeVenta::findOrFail($id);
                $nota->update([
                    'importe' => $validated['importe'],
                    'fecha' => $validated['fecha'],
                    'metodo_pago_id' => $validated['metodo_pago_id'],
                    'usuario_id' => $validated['usuario_id']
                ]);

                $detalles = [];
                foreach ($validated['inventarios'] as $item) {
                    $detalles[$item['id']] = ['cantidad' => $item['cantidad']];
                }

                $nota->inventarios()->sync($detalles);
            });

            return redirect()->route('nota_venta.index')
                ->with('success', 'Nota de venta actualizada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $nota = NotaDeVenta::findOrFail($id);
                $nota->delete();
            });

            return redirect()->route('nota_venta.index')
                ->with('success', 'Nota de venta eliminada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar nota de venta: ' . $e->getMessage());
        }
    }
}