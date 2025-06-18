@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Editar Mesa #{{ $mesa->Nro }}</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás editar los datos de una mesa. Actualiza la información requerida
                    para mantener los registros del sistema al día.
                </span>
            </div>

            <!-- div para errores -->
            @include('partials.errors')

            <form action="{{ route('mesas.update', $mesa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="Nro"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Número de Mesa</label>
                    <input type="number" name="Nro" id="Nro" value="{{ old('Nro', $mesa->Nro) }}" required min="1"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Nro') outline-red-500 @enderror">
                    @error('Nro')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                    <small class="text-xs font-light italic">Mínimo: 1</small>
                </div>
                
                <div class="mb-4">
                    <label for="Capacidad"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Capacidad</label>
                    <input type="number" name="Capacidad" id="Capacidad" value="{{ old('Capacidad', $mesa->Capacidad) }}" required min="1"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Capacidad') outline-red-500 @enderror">
                    @error('Capacidad')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                    <small class="text-xs font-light italic">Mínimo: 1 persona</small>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('mesas.index') }}"
                        class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Actualizar Mesa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection