@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo proveedor</h1>
        </div>
        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás registrar un nuevo proveedor, asegúrate de completar todos los campos requeridos. Los
                    proveedores son importantes para la gestión de inventario y compras en el sistema.
                </span>
            </div>
            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required maxlength="100"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('nombre') outline-red-500 @enderror">
                    @error('nombre')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('email') outline-red-500 @enderror">
                    @error('email')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="negocio" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre
                        del negocio</label>
                    <input type="text" name="negocio" id="negocio" value="{{ old('negocio') }}" maxlength="100"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('negocio') outline-red-500 @enderror">
                    @error('negocio')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="telefono"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Telefono</label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" pattern="[0-9]{7,15}"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('telefono') outline-red-500 @enderror">
                    <small class="text-xs font-light italic">Formato: +591 12345678</small>
                    @error('telefono')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('proveedores.index') }}"
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
