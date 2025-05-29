@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo privilegio</h1>
        </div>

        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás crear un nuevo privilegio, recuerda que los privilegios son importantes para la seguridad
                    del sistema,
                    por lo que debes tener cuidado al crear nuevos privilegios.
                </span>
            </div>

            @include('partials.errors')

            <form action="{{ route('privilegios.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="Funcion"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Funcion</label>
                    <div class="relative">
                        <select id="Funcion" name="Funcion"
                            class="block appearance-none w-full bg-white dark:bg-gray-800 outline-1 outline-brown-300
                             text-gray-700 dark:text-gray-200 py-2 px-3 pr-10 rounded-lg 
                            focus:outline-2 focus:outline-orange-700"
                            required>
                            <option disabled selected>Selecciona una función</option>
                            <option value="ver">Ver</option>
                            <option value="crear">Crear</option>
                            <option value="editar">Editar</option>
                            <option value="eliminar">Eliminar</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 dark:text-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="Caracteristica"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Caracteristica</label>
                    <div class="relative">
                        <select id="Caracteristica" name="Caracteristica"
                            class="block appearance-none w-full bg-white dark:bg-gray-800 outline-1 outline-brown-300
                             text-gray-700 dark:text-gray-200 py-2 px-3 pr-10 rounded-lg 
                            focus:outline-2 focus:outline-orange-700"
                            required>
                            <option disabled selected>Selecciona una caracteristica</option>
                            @foreach (\App\Http\Controllers\UtilController::getModelString() as $name => $value)
                                <option value="{{ $value }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 dark:text-gray-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="rol"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Roles</label>
                    <div class="py-2 px-4 rounded-lg outline-1 outline-brown-300 ">
                        @foreach ($roles as $rol)
                            <div class="pb-2 flex items-center gap-4">
                                <label class="flex items-center cursor-pointer gap-2">
                                    <input type="checkbox" name="rol[]" value="{{ $rol->id }}" class="peer sr-only">
                                    <div
                                        class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:bg-orange-700
                                         peer-checked:border-orange-700 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="none"
                                            stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-800 dark:text-gray-200">{{ $rol->Cargo }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="flex justify-end gap-2">
                    <a href="{{ route('privilegios.index') }}"
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
