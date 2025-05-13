@extends('layouts.auth')

@section('content')
    <div class="bg-white py-16 flex items-center rounded-2xl shadow-lg">
        <div class="w-full px-12">
            <h1 class="font-bold text-3xl text-gray-600">Registro de usuarios</h1>
            <section id="login" class="mt-8">
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="flex-col">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                            <input type="text" name="name" id="name" required
                                class="py-4 shadow appearance-none border-0 rounded-lg w-full px-3 text-gray-700 leading-tight 
                                 bg-gray-100 placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-500 
                                 transition duration-300 ease-in-out"
                                placeholder="Nombre completo">
                        </div>
                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 font-bold mb-2">Telefono</label>
                            <input type="text" name="telefono" id="telefono" required
                                class="py-4 shadow appearance-none border-0 rounded-lg w-full px-3 text-gray-700 leading-tight 
                                 bg-gray-100 placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-500 
                                 transition duration-300 ease-in-out"
                                placeholder="Telefono">
                        </div>
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
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Repetir
                                contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="py-4 shadow appearance-none border-0 rounded-lg w-full px-3 text-gray-700 leading-tight 
                                 bg-gray-100 placeholder-gray-400 outline-none focus:ring-2 focus:ring-blue-500 
                                 transition duration-300 ease-in-out"
                                placeholder="Repetir contraseña">
                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                class="flex justify-center items-center hover:cursor-pointer w-full text-white hover:bg-green-700 bg-green-600 font-medium text-xl py-3 rounded-xl transition duration-300 ease-in-out">
                                Registrarse
                            </button>
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
