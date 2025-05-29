@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Recetas registradas</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('recetas.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todas las recetas registradas en el sistema. Puedes crear nuevas recetas,
                    editar las existentes o eliminar aquellas que ya no necesites.
                </span>
            </div>

            <div class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    NRO RECETA
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    PRODUCTO
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    INGREDIENTES
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">ACCIONES</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recetas as $receta)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800 font-medium">
                                        {{ $receta->nro }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $receta->producto->inventarios->nombre }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $receta->ingredientes->count() }} ingredientes
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('recetas.show', $receta->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('recetas.edit', $receta->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('recetas.destroy', $receta->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar la receta: {{ $receta->nro }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">
                                    No hay recetas disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación corregida -->
            @if($recetas->hasPages())
                <div class="mt-4">
                    {{ $recetas->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection