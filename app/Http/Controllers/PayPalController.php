<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Models\NotaDeVenta;
use App\Models\MetodoPago;
use Illuminate\Support\Facades\DB;

class PayPalController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function createPayment(Request $request)
    {
        $carrito = json_decode($request->input('carrito'), true);
        $total = (float)$request->input('total');
    
        if(empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío');
        }
    
        $items = [];
        foreach ($carrito as $item) {
            $items[] = [
                'id' => $item['id'],
                'nombre' => $item['nombre'],
                'precio' => (float)$item['precio'],
                'cantidad' => (int)$item['cantidad']
            ];
        }
    
        try {
            $response = $this->paypalService->createOrder($total, $items);
            
            // Buscar URL de aprobación
            $approvalUrl = null;
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    $approvalUrl = $link['href'];
                    break;
                }
            }
        
            if (!$approvalUrl) {
                throw new \Exception('No se encontró enlace de aprobación en la respuesta de PayPal');
            }
        
            session([
                'paypal_order_id' => $response['id'],
                'venta_data' => [
                    'carrito' => $carrito,
                    'total' => $total,
                    'usuario_id' => auth()->id() ?? null
                ]
            ]);
        
            return redirect()->away($approvalUrl);
            
        } catch (\Exception $e) {
            \Log::error('PayPal Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al procesar el pago: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $orderId = session('paypal_order_id');
        $ventaData = session('venta_data');
        
        if (!$orderId || !$ventaData) {
            return redirect()->route('metodo_pago')->with('error', 'Sesión expirada o datos perdidos');
        }
    
        DB::beginTransaction();
        try {
            $metodoPago = MetodoPago::where('nombre', 'PayPal')->firstOrFail();
        
            $notaVenta = NotaDeVenta::create([
                'importe' => $ventaData['total'],
                'fecha' => now(),
                'metodo_pago_id' => $metodoPago->id,
                'usuario_id' => $ventaData['usuario_id']
            ]);
        
            $detalles = [];
            foreach ($ventaData['carrito'] as $item) {
                $detalles[$item['id']] = ['cantidad' => $item['cantidad']];
            }
            $notaVenta->inventarios()->attach($detalles);
        
            DB::commit();
            
            session()->forget(['paypal_order_id', 'venta_data']);
            
            return redirect()->route('gracias')->with([
                'success' => '¡Pago completado con éxito!',
                'order_id' => $orderId
            ]);
        
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Venta Error: ' . $e->getMessage());
            return redirect()->route('metodo_pago')->with('error', 'Error al registrar la venta: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->route('metodos.pago')->with('warning', 'Pago cancelado');
    }
}