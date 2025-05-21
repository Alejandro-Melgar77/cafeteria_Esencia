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
        //
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

    public function descargarBitacoraPdf($inicio, $final)
    {
        //  $final = "2025-05-12";
        //$inicio = "2025-04-12";
        //dd($inicio);
        $bitacora = DB::select('select *
                                        from bitacoras
                                         where bitacoras.fecha<=? and bitacoras.fecha>=?',
            [$final, $inicio]
        );

        //dd($bitacora);

        $data = [
            "bitacora" => $bitacora,
        ];
        $pdf = Pdf::loadView('bitacoraPdf', $data);
        return $pdf->download('Reporte-'.Carbon::now().'.pdf');
    }
    public function descargarBitacoraPdfAll()
    {
        $bitacora = DB::select('select *
                                        from bitacoras');
        $data = [
            "bitacora" => $bitacora,
        ];
        $pdf = Pdf::loadView('bitacoraPdf', $data);
        return $pdf->download('Reporte-'.Carbon::now().'.pdf');
    }
}
