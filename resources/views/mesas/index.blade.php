@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Mesas registradas</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('mesas.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todas las mesas registradas en el sistema. Puedes crear nuevas mesas o
                    editar las existentes para mantener actualizada la disponibilidad del restaurante.
                </span>
            </div>

            <div
                class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Número
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Capacidad
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100 w-48">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Acciones
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mesas as $mesa)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $mesa->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        Mesa #{{ $mesa->Nro }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $mesa->Capacidad }} personas
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('mesas.show', [$mesa->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('mesas.edit', [$mesa->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('mesas.destroy', [$mesa->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar la Mesa #{{ $mesa->Nro }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">
                                    No hay mesas registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $mesas->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection