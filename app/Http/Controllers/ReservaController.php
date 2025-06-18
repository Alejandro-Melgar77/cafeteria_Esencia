<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['mesas'])->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $mesas = Mesa::all();
        return view('reservas.create', compact('mesas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'duracion' => 'required|numeric|min:1',
            'hora' => 'required|date_format:H:i',
            'mesas' => 'required|array|min:1',
            'mesas.*.id' => 'required|exists:mesas,id',
            'mesas.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $reserva = Reserva::create([
                    'fecha' => $validated['fecha'],
                    'duracion' => $validated['duracion'],
                    'hora' => $validated['hora']
                ]);

                $mesasData = [];
                foreach ($validated['mesas'] as $mesa) {
                    $mesasData[$mesa['id']] = ['cantidad' => $mesa['cantidad']];
                }

                $reserva->mesas()->sync($mesasData);
            });

            return redirect()->route('reservas.index')
                ->with('success', 'Reserva creada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al crear reserva: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $reserva = Reserva::with(['mesas'])->findOrFail($id);
        return view('reservas.show', compact('reserva'));
    }

    public function edit($id)
    {
        $reserva = Reserva::with(['mesas'])->findOrFail($id);
        $mesas = Mesa::all();
        return view('reservas.edit', compact('reserva', 'mesas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fecha' => 'required|date',
            'duracion' => 'required|numeric|min:1',
            'hora' => 'required|date_format:H:i',
            'mesas' => 'required|array|min:1',
            'mesas.*.id' => 'required|exists:mesas,id',
            'mesas.*.cantidad' => 'required|integer|min:1'
        ]);

        try {
            DB::transaction(function () use ($validated, $id) {
                $reserva = Reserva::findOrFail($id);
                $reserva->update([
                    'fecha' => $validated['fecha'],
                    'duracion' => $validated['duracion'],
                    'hora' => $validated['hora']
                ]);

                $mesasData = [];
                foreach ($validated['mesas'] as $mesa) {
                    $mesasData[$mesa['id']] = ['cantidad' => $mesa['cantidad']];
                }

                $reserva->mesas()->sync($mesasData);
            });

            return redirect()->route('reservas.index')
                ->with('success', 'Reserva actualizada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al actualizar reserva: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $reserva = Reserva::findOrFail($id);
                $reserva->mesas()->detach();
                $reserva->delete();
            });

            return redirect()->route('reservas.index')
                ->with('success', 'Reserva eliminada correctamente');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('danger', 'Error al eliminar reserva: ' . $e->getMessage());
        }
    }
}