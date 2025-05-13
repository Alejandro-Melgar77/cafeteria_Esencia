<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <h1>Bitacora</h1>
    <table class="table table-bordered">
        <tr>
            <th>FECHA</th>
            <th>HORA</th>
            <th>ACCION</th>
            <th>USUARIO ID</th>
        </tr>
        
    @foreach ($bitacora as $b)
        <tr>
            <td>{{ $b->fecha }}</td>
            <td>{{ $b->hora }}</td>
            <td>{{ $b->accion }}</td>
            <td>{{ $b->codigoUsuario }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>