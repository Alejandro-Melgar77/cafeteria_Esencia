@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl dark:text-white">Reservas registradas</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-brown-600 p-2 rounded-lg hover:bg-brown-700 text-white"
                        href="{{ route('reservas.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light dark:text-gray-300">
                    Aquí podrás ver todas las reservas registradas en el sistema. Puedes crear nuevas reservas,
                    editar las existentes o eliminar aquellas que ya no necesites.
                </span>
            </div>

            <div class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white dark:bg-brown-600 border border-gray-200 dark:border-brown-500 rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    FECHA
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    HORA
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    DURACIÓN
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    MESAS
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">ACCIONES</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservas as $reserva)
                            <tr class="hover:bg-slate-50 dark:hover:bg-brown-500">
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200 font-medium">
                                        #{{ $reserva->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $reserva->duracion }} horas
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $reserva->mesas->count() }} mesas
                                        @php
                                            $totalPersonas = 0;
                                            foreach ($reserva->mesas as $mesa) {
                                                $totalPersonas += $mesa->Capacidad * $mesa->pivot->cantidad;
                                            }
                                        @endphp
                                        <span class="text-xs text-gray-500 dark:text-gray-300">
                                            ({{ $totalPersonas }} personas)
                                        </span>
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 dark:border-brown-400 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('reservas.show', $reserva->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 dark:text-cyan-400 outline hover:text-cyan-900 dark:hover:text-cyan-300 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('reservas.edit', $reserva->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 dark:text-yellow-400 outline hover:text-yellow-900 dark:hover:text-yellow-300 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 dark:text-red-400 outline hover:text-red-900 dark:hover:text-red-300 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar la reserva #{{ $reserva->id }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500 dark:text-gray-300">
                                    No hay reservas disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            @if($reservas->hasPages())
                <div class="mt-4">
                    {{ $reservas->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection