@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo rol</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aqui podras crear un nuevo rol, recuerda que los roles son importantes para la seguridad del sistema,
                    por lo que debes tener cuidado al crear nuevos roles.
                </span>
            </div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="Cargo"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Cargo</label>
                    <input type="text" name="Cargo" id="Cargo" value="{{ old('Cargo') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('Cargo') outline-red-500 @enderror">
                    @error('Cargo')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('roles.index') }}"
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
