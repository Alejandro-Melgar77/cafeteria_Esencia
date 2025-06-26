@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Métodos de pago registrados</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('metodo_pago.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todos los métodos de pago registrados en el sistema. Puedes crear nuevos métodos,
                    editar los existentes o eliminar aquellos que ya no necesites.
                </span>
            </div>

            <div
                class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border dark:bg-brown-600 dark:border-brown-500">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-brown-800 dark:border-brown-500">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-brown-800 dark:border-brown-500">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    Nombre
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-brown-800 dark:border-brown-500">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    Saldo
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-brown-800 dark:border-brown-500">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    Descripción
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100 dark:bg-brown-800 dark:border-brown-500">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">Acciones</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($metodosPago as $metodo)
                            <tr class="hover:bg-slate-50 dark:hover:bg-brown-600">
                                <td class="p-3 border-b border-gray-200 dark:border-brown-500">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $metodo->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-500">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $metodo->nombre }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-500">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ number_format($metodo->saldo, 2) }} Bs.
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-500">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200 truncate max-w-xs">
                                        {{ $metodo->descripcion ?? 'Sin descripción' }}
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 dark:border-brown-500 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <!-- Botón de Ver (show) -->
                                        <a href="{{ route('metodo_pago.show', $metodo->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg dark:text-cyan-400 dark:hover:text-cyan-300">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        
                                        <!-- Botón de Editar (edit) -->
                                        <a href="{{ route('metodo_pago.edit', $metodo->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg dark:text-yellow-400 dark:hover:text-yellow-300">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        
                                        <!-- Botón de Eliminar (destroy) -->
                                        <form action="{{ route('metodo_pago.destroy', $metodo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer dark:text-red-400 dark:hover:text-red-300"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar el método de pago: {{ $metodo->nombre }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-300">
                                    No hay métodos de pago registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $metodosPago->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection