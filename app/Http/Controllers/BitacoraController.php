<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bitacoras.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function descargarRango(Request $request)
    {
        $inicio = $request->input('inicio');
        $final = $request->input('final');
        $bitacora = Bitacora::where('fecha', '>=', $inicio)
            ->where('fecha', '<=', $final)
            ->with('usuario')
            ->get();
        $data = [
            "bitacora" => $bitacora,
        ];
        $pdf = Pdf::loadView('bitacoraPdf', $data);
        return $pdf->download('Reporte-' . Carbon::now() . '.pdf');
    }
    public function descargar()
    {
        $bitacora = Bitacora::with('usuario')->get();
        $data = [
            "bitacora" => $bitacora,
        ];
        $pdf = Pdf::loadView('bitacoraPdf', $data);
        return $pdf->stream('Reporte-' . Carbon::now() . '.pdf');
        // return $pdf->download('Reporte-' . Carbon::now() . '.pdf');
        // return view('bitacoraPdf', $data);
    }
}