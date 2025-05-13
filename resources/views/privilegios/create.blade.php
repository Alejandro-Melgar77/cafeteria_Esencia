<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action={{route('privilegios.store')}}>
        @csrf
    <input name="Funcion">
    @foreach ($roles as $rol)
    <label>{{ $rol->Cargo }}</label>
        <input name="rol[{{ $rol->id }}]" value="{{ $rol->id }}" type="checkbox">
    @endforeach
    <button type="submit"> registrar</button>

    </form>
</body>
</html>