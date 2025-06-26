<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Venta</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .info {
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1 style="font-size: 24px; margin: 0;">COMPROBANTE DE VENTA</h1>
        <p style="margin: 5px 0;">Sistema de Ventas</p>
    </div>

    <div class="header">
        <p style="margin: 0;"><strong>N° Comprobante:</strong> COMP-{{ $comprobante->id }}</p>
        <p style="margin: 0;"><strong>Fecha Emisión:</strong> {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>

    <div class="info">
        <div>
            <p><strong>Nota de Venta ID:</strong> {{ $notaDeVenta->id }}</p>
            <p><strong>Fecha Venta:</strong> {{ \Carbon\Carbon::parse($notaDeVenta->fecha)->format('d/m/Y') }}</p>
        </div>
        <div>
            <p><strong>Cliente:</strong> {{ $notaDeVenta->usuario->Nombre ?? 'Cliente General' }}</p>
            <p><strong>Método Pago:</strong> {{ $notaDeVenta->metodoPago->nombre }}</p>
        </div>
    </div>

    <h2 style="margin-bottom: 10px;">Detalle de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>P. Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notaDeVenta->inventarios as $inventario)
                @php
                    $tipo = '';
                    $nombre = '';
                    $precio = 0;
                    
                    if ($inventario->productos) {
                        $tipo = 'Producto';
                        $nombre = $inventario->nombre;
                        $precio = $inventario->productos->Precio_venta;
                    } elseif ($inventario->ingredientes) {
                        $tipo = 'Ingrediente';
                        $nombre = $inventario->nombre;
                        // Para ingredientes, usa el precio del inventario o un valor predeterminado
                        $precio = $inventario->costo * 1.5; // Ejemplo: 50% de margen
                    }
                @endphp
                <tr>
                    <td>{{ $tipo }}</td>
                    <td>{{ $nombre }}</td>
                    <td>{{ $inventario->pivot->cantidad }}</td>
                    <td>S/ {{ number_format($precio, 2) }}</td>
                    <td>S/ {{ number_format($inventario->pivot->cantidad * $precio, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p>TOTAL: S/ {{ number_format($notaDeVenta->importe, 2) }}</p>
    </div>

    <div class="footer">
        <p>¡Gracias por su compra!</p>
        <p>Este comprobante es generado automáticamente por el sistema</p>
        <p>Fecha de impresión: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>