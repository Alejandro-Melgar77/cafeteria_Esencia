<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action={{route('roles.update',[$rol->id])}}>
        @csrf
        @method('PUT')
    <input name="Cargo" value="{{$rol->Cargo}}">
    <button type="submit"> modificar</button>

    </form>
</body>
</html>