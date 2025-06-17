<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Notas de Salida</title>
    <style>
        body { font-family: Arial; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Reporte de Notas de Salida</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Monto Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->codigo }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>{{ $nota->cliente->Nombre }}</td>
                    <td>{{ $nota->monto_total }} Bs</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
