@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">

        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo Ingrediente</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aqui podras crear un nuevo ingrediente, ingresa la información
                    requerida en el formulario para registrar un ingrediente en el sistema.
                </span>
            </div>

            <!-- div para errores -->
            @include('partials.errors')

            <form action="{{ route('ingredientes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('nombre') outline-red-500 @enderror"
                        maxlength="100">
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
                            focus:outline-orange-700 sm:text-sm/6 @error('costo') outline-red-500 @enderror"
                        step="0.01">
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
                    <label for="Unidad_Medida"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Unidad de Medida</label>
                    <div class="relative">
                        <select id="Unidad_Medida" name="Unidad_Medida"
                            class="block appearance-none w-full bg-white dark:bg-gray-800 outline-1 outline-brown-300
                             text-gray-700 dark:text-gray-200 py-2 px-3 pr-10 rounded-lg 
                            focus:outline-2 focus:outline-orange-700"
                            required>
                            <option value="kg">Kilogramos</option>
                            <option value="gr">Gramos</option>
                            <option value="lt">Litros</option>
                            <option value="unidad">Unidades</option>
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
                    <input type="text" name="Costo_Unitario" id="Costo_Unitario" value="{{ old('Costo_Unitario') }}"
                        required
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
                    <input type="text" name="Costo_Promedio" id="Costo_Promedio" value="{{ old('Costo_Promedio') }}"
                        required
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
                        Registrar
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Crear nuevo ingrediente</h4>
                <form action="{{ route('ingredientes.store') }}" method="POST">
                    @csrf
                    <div class=" mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class=" mb-3">
                        <label for="fecha_vco" class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="fecha_vco" name="fecha_vco" required>
                    </div>
                    <div class=" mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" required>
                    </div>
                    <div class=" mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" required>
                    </div>
                    {{-- ingrediente --}}
                    <div class=" mb-3">
                        <label for="Unidad_Medida" class="form-label">Unidad Medida</label>
                        <input type="text" class="form-control" id="Unidad_Medida" name="Unidad_Medida" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Costo_Unitario" class="form-label">Costo Unitario</label>
                        <input type="text" class="form-control" id="Costo_Unitario" name="Costo_Unitario" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Costo_Promedio" class="form-label">Costo Promedio</label>
                        <input type="text" class="form-control" id="Costo_Promedio" name="Costo_Promedio" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Crear producto</button>
                </form>

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
