<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   @foreach ($roles as $rol )
       {{$rol->Cargo}}
       <a href="{{route('roles.edit',[$rol->id])}}">editar</a>
       <form method="POST" action="{{route('roles.destroy',[$rol->id])}}">
        @csrf @method('DELETE')
        <button type="submit" onclick="confirm('estas seguro? ')">eliminar</button></form>

       <br>

   @endforeach
</body>
</html>