@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">

        <div class="title text-xl font-semibold flex items-center">
            <h1>Editar Ingrediente</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás editar un ingrediente, asegúrate de completar todos los campos requeridos. Los
                    ingredientes son importantes para la gestión de inventario y ventas en el sistema.
                </span>
            </div>

            <!-- div para errores -->
            @include('partials.errors')

            <form action="{{ route('ingredientes.update', [$ingrediente->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        value="{{ old('nombre', $ingrediente->inventarios->nombre) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('nombre') outline-red-500 @enderror">
                    @error('nombre')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="fecha_vco" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Fecha
                        de vencimiento</label>
                    <input type="date" name="fecha_vco" id="fecha_vco"
                        value="{{ old('fecha_vco', $ingrediente->inventarios->fecha_vco) }}"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('fecha_vco') outline-red-500 @enderror">
                    @error('fecha_vco')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="costo"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Costo</label>
                    <input type="text" name="costo" id="costo"
                        value="{{ old('costo', $ingrediente->inventarios->costo) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('costo') outline-red-500 @enderror">
                    @error('costo')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stock"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Stock</label>
                    <input type="text" name="stock" id="stock"
                        value="{{ old('stock', $ingrediente->inventarios->stock) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('stock') outline-red-500 @enderror">
                    @error('stock')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Unidad_Medida"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Unidad de Medida</label>
                    <div class="relative">
                        <select id="Unidad_Medida" name="Unidad_Medida"
                            class="block appearance-none w-full bg-white dark:bg-gray-800 outline-1 outline-brown-300
                             text-gray-700 dark:text-gray-200 py-2 px-3 pr-10 rounded-lg 
                            focus:outline-2 focus:outline-orange-700"
                            required>
                            <option value="kg" @if ($ingrediente->Unidad_Medidad === 'kg') selected @endif>Kilogramos</option>
                            <option value="gr" @if ($ingrediente->Unidad_Medidad === 'gr') selected @endif>Gramos</option>
                            <option value="lt" @if ($ingrediente->Unidad_Medidad === 'lt') selected @endif>Litros</option>
                            <option value="unidad" @if ($ingrediente->Unidad_Medidad === 'unidad') selected @endif>Unidades</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 dark:text-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    @error('Unidad_Medida')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Costo_Unitario"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Costo Unitario</label>
                    <input type="text" name="Costo_Unitario" id="Costo_Unitario"
                        value="{{ old('Costo_Unitario', $ingrediente->Costo_Unitario) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Costo_Unitario') outline-red-500 @enderror">
                    @error('Costo_Unitario')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Costo_Promedio"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Costo Promedio</label>
                    <input type="text" name="Costo_Promedio" id="Costo_Promedio"
                        value="{{ old('Costo_Promedio', $ingrediente->Costo_Promedio) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Costo_Promedio') outline-red-500 @enderror">
                    @error('Costo_Promedio')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('inventarios.index') }}"
                        class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Editar
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
