@extends('layouts.auth')

@section('content')
<div class="flex min-h-screen w-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-32 w-auto" src="{{ asset('images/logo.png') }}" alt="Cafeteria Logo">
        <h2 class="mt-4 font-bold text-xl text-center text-brown-800">Restablecer Contraseña</h2>
    </div>

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-8 rounded-xl border-4 border-brown-400 shadow-md">
        <form class="space-y-6" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm/6 font-medium text-brown-900">Correo Electrónico</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" required
                        class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                        -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                        focus:outline-orange-500 sm:text-sm/6"
                        value="{{ $email ?? old('email') }}" readonly>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm/6 font-medium text-brown-900">Nueva Contraseña</label>
                <div class="mt-2">
                    <input type="password" name="password" id="password" required
                        class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                        -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                        focus:outline-orange-500 sm:text-sm/6"
                        placeholder="••••••••">
                </div>
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm/6 font-medium text-brown-900">Confirmar Contraseña</label>
                <div class="mt-2">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="block w-full rounded-lg bg-white px-3 py-2 text-base text-gray-900 outline-1 
                        -outline-offset-1 outline-brown-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 
                        focus:outline-orange-500 sm:text-sm/6"
                        placeholder="••••••••">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-brown-600 px-3 py-2 
                    text-sm/6 font-semibold text-white shadow-xs hover:bg-brown-500 focus-visible:outline-2 
                    focus-visible:outline-offset-2 focus-visible:outline-brown-600 cursor-pointer">
                    Restablecer Contraseña
                </button>
            </div>
        </form>
    </div>
</div>
@endsection