@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo cliente</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás crear un nuevo cliente, ingresa la información requerida en el formulario para registrar un
                    cliente en el sistema.
                </span>
            </div>
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="Nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="Nombre" id="Nombre" value="{{ old('Nombre') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Nombre') outline-red-500 @enderror">
                    @error('Nombre')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Email"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Email</label>
                    <input type="email" name="Email" id="Email" value="{{ old('Email') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Email') outline-red-500 @enderror">
                    @error('Email')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Telefono"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Telefono</label>
                    <input type="text" name="Telefono" id="Telefono" value="{{ old('Telefono') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Telefono') outline-red-500 @enderror">
                    @error('Telefono')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('clientes.index') }}"
                        class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
