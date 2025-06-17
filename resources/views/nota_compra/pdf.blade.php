{{-- resources/views/nota_compra/pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota de Compra</title>
    <style>
        body { font-family: Arial; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Nota de Compra - {{ $nota->codigo }}</h2>
    <p><strong>Fecha:</strong> {{ $nota->fecha }}</p>
    <p><strong>Proveedor:</strong> {{ $nota->proveedor->nombre }}</p>
    <p><strong>Método de Pago:</strong> {{ $nota->metodoPago->nombre }}</p>
    <p><strong>Registrado por:</strong> {{ $nota->usuario->name }}</p>

    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>ID</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nota->detalles as $detalle)
                <tr>
                    <td>{{ ucfirst($detalle->item->nombre) }}</td>
                    <td>{{ $detalle->inventario_id }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->precio_unitario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Total: {{ $nota->monto_total }} Bs</h4>
</body>
</html>