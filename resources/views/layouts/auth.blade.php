<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="w-5/5 md:w-3/5 xl:w-2/5 px-12">
            @yield('content')
        </div>
    </div>
</body>

</html>
