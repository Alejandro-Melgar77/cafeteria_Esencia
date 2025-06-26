@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen w-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-32 w-auto" src="{{ asset('images/logo.png') }}" alt="Cafeteria Logo">
        <h2 class="mt-4 font-bold text-xl text-center text-brown-800">Recuperar Contraseña</h2>
    </div>

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-8 rounded-xl border-4 border-brown-400 shadow-md">
        @if (session('status'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm/6 font-medium text-brown-900">Correo Electrónico</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" required
                        class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                        -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                        focus:outline-orange-500 sm:text-sm/6"
                        placeholder="tu@ejemplo.com" value="{{ old('email') }}">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-brown-600 px-3 py-2 
                    text-sm/6 font-semibold text-white shadow-xs hover:bg-brown-500 focus-visible:outline-2 
                    focus-visible:outline-offset-2 focus-visible:outline-brown-600 cursor-pointer">
                    Enviar Enlace de Recuperación
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            <a href="{{ route('login') }}" class="font-semibold text-orange-900 hover:text-orange-700">
                ← Volver al inicio de sesión
            </a>
        </p>
    </div>
</div>
@endsection