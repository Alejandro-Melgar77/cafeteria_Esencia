@extends('layouts.auth')

@section('content')
    <div class="bg-white py-16 flex items-center rounded-2xl shadow-lg">
        <div class="w-full px-12">
            <h1 class="font-bold text-3xl text-gray-600">Iniciar sesión</h1>
            <section id="login" class="mt-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex-col">
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Correo
                                electrónico</label>
                            <input type="email" name="email" id="email" required
                                class="py-4 shadow appearance-none border-0 rounded-lg w-full px-3 text-gray-700 leading-tight 
                                 bg-gray-100 placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-500 
                                 transition duration-300 ease-in-out"
                                placeholder="Correo electrónico">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                            <input type="password" name="password" id="password" required
                                class="py-4 shadow appearance-none border-0 rounded-lg w-full px-3 text-gray-700 leading-tight 
                                 bg-gray-100 placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-500 
                                 transition duration-300 ease-in-out"
                                placeholder="Contraseña">
                        </div>
                        <div class="mb-4 flex py-4">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" class="mr-2 leading-tight">
                                <label for="remember" class="text-gray-700">Recordarme</label>
                            </div>
                            <div class="ml-auto">
                                <a href="#" class="text-blue-500 hover:text-blue-700 text-sm">¿Olvidaste tu
                                    contraseña?</a>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="hover:cursor-pointer w-full bg-blue-600 hover:bg-blue-800 text-white font-medium text-xl py-3 rounded-xl transition duration-300 ease-in-out">
                                Iniciar sesión
                            </button>
                        </div>
                        <div class="mb-4">
                            <a type="button" href="{{ route('register') }}"
                                class="flex justify-center items-center hover:cursor-pointer w-full bg-gray-200 font-medium text-xl py-3 rounded-xl transition duration-300 ease-in-out">
                                Registrarse
                            </a>
                        </div>

                        @if ($errors->any())
                            <div class="mt-4">
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">¡Error!</strong>
                                    <span class="block sm:inline">{{ $errors->first() }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
