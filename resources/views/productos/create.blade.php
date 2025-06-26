@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">

        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo Producto</h1>
        </div>


        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aqui podras crear un nuevo producto, ingresa la información
                    requerida en el formulario para registrar un producto en el sistema.
                </span>
            </div>

            <!-- div para errores -->
            @include('partials.errors')

            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
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
                    <input type="date" name="fecha_vco" id="fecha_vco" value="{{ old('fecha_vco') }}"
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
                    <input type="text" name="costo" id="costo" value="{{ old('costo') }}" required
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
                    <input type="text" name="stock" id="stock" value="{{ old('stock') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('stock') outline-red-500 @enderror">
                    @error('stock')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Precio_venta"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Precio de venta</label>
                    <input type="text" name="Precio_venta" id="Precio_venta" value="{{ old('Precio_venta') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Precio_venta') outline-red-500 @enderror">
                    @error('Precio_venta')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Costo_produccion"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Costo de
                        produccion</label>
                    <input type="text" name="Costo_produccion" id="Costo_produccion"
                        value="{{ old('Costo_produccion') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Costo_produccion') outline-red-500 @enderror">
                    @error('Costo_produccion')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Porcentaje_utilidad"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Porcentaje de
                        utilidad</label>
                    <input type="text" name="Porcentaje_utilidad" id="Porcentaje_utilidad"
                        value="{{ old('Porcentaje_utilidad') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Porcentaje_utilidad') outline-red-500 @enderror">
                    @error('Porcentaje_utilidad')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>Add commentMore actions
                    @enderror
                </div>

                {{-- imagen --}}
                <!-- imagen -->
                


                <div class="mb-4">
                    <label for="photo"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Imagen</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo') }}" 
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('photo') outline-red-500 @enderror">
                    @error('photo')
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
                        Registrar
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
