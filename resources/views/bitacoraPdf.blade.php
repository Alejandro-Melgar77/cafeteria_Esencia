<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
    {{-- <link rel="stylesheet" href="css/pdf.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> --}}

    {{-- <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: normal;
            src: url("file://{{ storage_path('fonts/poppins/Poppins-Regular.ttf') }}") format('truetype');
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 4px 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f5f5f5;
        }
    </style> --}}
    <style>
        body {
            background-image: url("file://{{ public_path('images/pdf-fondo3.png') }}");
            background-size: 60%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 1;
            /* importante para mantener el texto visible */
        }
    </style>

</head>

<body>

    <h1 class="text-xl font-bold mb-4">Informe</h1>
    {{-- <img src="{{ public_path('images/logo.png') }}" width="120" alt="Logo"> --}}

    <div style="margin-bottom: 20px;">
        <p>Usuario: {{ Auth::user()->email }}</p>
        <p>Fecha: {{ now()->format('d/m/Y') }}</p>
        <p>Hora: {{ now()->format('H:i:s') }}</p>
    </div>

    <h2 class="font-bold">Registro de bitacora</h2>
    <table>
        <tr>
            <th>FECHA</th>
            <th>HORA</th>
            <th>ACCION</th>
            <th>IP</th>
            <th>USUARIO ID</th>
            <th>NOMBRE</th>
            <th>CARGO</th>
        </tr>

        @foreach ($bitacora as $b)
            <tr>
                <td>{{ $b->fecha }}</td>
                <td>{{ $b->hora }}</td>
                <td>{{ $b->accion }}</td>
                <td>{{ $b->ip }}</td>
                <td>{{ $b->usuario->id }}</td>
                <td>{{ $b->usuario->Nombre }}</td>
                <td>{{ $b->usuario->rol->Cargo }}</td>
            </tr>
        @endforeach
    </table>


</body>

</html>
