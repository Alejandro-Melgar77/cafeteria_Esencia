<?php

namespace App\Http\Controllers;

use App\Models\NotaDeVenta;
use App\Models\Comprobante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ComprobanteController extends Controller
{
    public function index()
    {
        // Obtener todas las notas de venta con relaciones necesarias
        $notasDeVenta = NotaDeVenta::with(['usuario', 'metodoPago'])
            ->orderBy('fecha', 'desc')
            ->get();
        
        return view('comprobantes.index', compact('notasDeVenta'));
    }

    public function generar($id)
    {
        $notaDeVenta = NotaDeVenta::with([
            'usuario', 
            'metodoPago', 
            'inventarios' => function($query) {
                $query->with(['productos', 'ingredientes']);
            }
        ])->findOrFail($id);
        
        // Crear registro en la tabla comprobantes
        $comprobante = Comprobante::create([
            'nota_de_venta_id' => $id
        ]);
    
        // Generar el PDF
        $pdf = Pdf::loadView('comprobantes.comprobantePdf', [
            'notaDeVenta' => $notaDeVenta,
            'comprobante' => $comprobante
        ]);
        
        // Descargar el PDF con nombre personalizado
        return $pdf->download('comprobante-' . $comprobante->id . '.pdf');
    }
}