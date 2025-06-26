@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo método de pago</h1>
        </div>
        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás registrar un nuevo método de pago, asegúrate de completar todos los campos requeridos. Los
                    métodos de pago son importantes para la gestión de transacciones en el sistema.
                </span>
            </div>
            <form action="{{ route('metodo_pago.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required maxlength="100"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('nombre') outline-red-500 @enderror"
                        placeholder="Efectivo, Transferencia, Tarjeta...">
                    @error('nombre')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="saldo" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Saldo inicial</label>
                    <input type="number" name="saldo" id="saldo" value="{{ old('saldo', 0) }}" step="0.01" min="0"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('saldo') outline-red-500 @enderror"
                        placeholder="0.00">
                    @error('saldo')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="descripcion" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('descripcion') outline-red-500 @enderror"
                        placeholder="Detalles adicionales del método de pago">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('metodo_pago.index') }}"
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