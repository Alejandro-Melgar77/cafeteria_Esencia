@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">

        <div class="title text-xl font-semibold flex items-center">
            <h1>Editar Producto</h1>
        </div>


        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás editar un producto, asegúrate de completar todos los campos requeridos. Los
                    productos son importantes para la gestión de inventario y ventas en el sistema.
                </span>
            </div>

            <!-- div para errores -->
            @include('partials.errors')

            <form action="{{ route('productos.update', [$producto->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                        value="{{ old('nombre', $producto->inventarios->nombre) }}" required
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
                        value="{{ old('fecha_vco', $producto->inventarios->fecha_vco) }}"
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
                        value="{{ old('costo', $producto->inventarios->costo) }}" required
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
                        value="{{ old('stock', $producto->inventarios->stock) }}" required
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
                    <input type="text" name="Precio_venta" id="Precio_venta"
                        value="{{ old('Precio_venta', $producto->Precio_venta) }}" required
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
                        value="{{ old('Costo_produccion', $producto->Costo_produccion) }}" required
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
                        value="{{ old('Porcentaje_utilidad', $producto->Porcentaje_utilidad) }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Porcentaje_utilidad') outline-red-500 @enderror">
                    @error('Porcentaje_utilidad')
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


{{-- 
@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Editar Producto #{{ $producto->inventario->id }}</h4>
                <form action="{{ route('productos.update', [$producto->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campos del Inventario -->
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo"
                            value="{{ $producto->inventario->codigo }}" required maxlength="50">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            value="{{ $producto->inventario->nombre }}" required maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_vto" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" id="fecha_vto" name="fecha_vto"
                            value="{{ $producto->inventario->fecha_vto }}">
                    </div>

                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control" id="costo" name="costo" step="0.01"
                            value="{{ $producto->inventario->costo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" step="1"
                            value="{{ $producto->inventario->stock }}" required min="0">
                    </div>

                    <!-- Campo específico de Producto -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                            value="{{ $producto->precio }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Actualizar Producto</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}
