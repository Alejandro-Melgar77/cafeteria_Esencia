<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota de Salida</title>
    <style>
        body { font-family: Arial; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Nota de Salida - {{ $nota->codigo }}</h2>
    <p><strong>Fecha:</strong> {{ $nota->fecha }}</p>
    <p><strong>Descripcion:</strong> {{ $nota->descripcion}}</p>
    <p><strong>Registrado por:</strong> {{ $nota->usuario->name }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>ID</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nota->detalles as $detalle)
                <tr>
                    <td>{{ ucfirst($detalle->item->nombre) }}</td>
                    <td>{{ $detalle->inventario_id }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
