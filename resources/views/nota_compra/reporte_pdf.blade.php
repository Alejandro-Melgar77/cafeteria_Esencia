{{-- resources/views/nota_compra/reporte_pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Notas de Compra</title>
    <style>
        body { font-family: Arial; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Reporte de Notas de Compra</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Método de Pago</th>
                <th>Monto Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->codigo }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>{{ $nota->proveedor->nombre }}</td>
                    <td>{{ $nota->metodoPago->nombre }}</td>
                    <td>{{ $nota->monto_total }} Bs</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>