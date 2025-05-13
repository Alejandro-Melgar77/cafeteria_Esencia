<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action={{ route('clientes.store') }}>
        @csrf
        <input name="Email">
        <input name="Nombre">
        <input name="Telefono">

        <button type="submit">registrar</button>

    </form>
</body>

</html>
