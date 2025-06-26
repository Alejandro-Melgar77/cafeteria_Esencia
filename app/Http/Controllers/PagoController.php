<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaDeVenta;
use App\Models\NotaDeCompra;

class PagoController extends Controller
{
    public function index()
    {
        $ventas = NotaDeVenta::with('metodoPago')->paginate(10, ['*'], 'ventas_page');
        $compras = NotaDeCompra::with('metodoPago')->paginate(10, ['*'], 'compras_page');

        return view('pagos.index', compact('ventas', 'compras'));
    }
}
