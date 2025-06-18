@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl dark:text-white">Detalles de la Reserva</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('reservas.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light dark:text-gray-300">
                    Aquí podrás ver los detalles completos de la reserva, incluyendo las mesas asignadas y su distribución.
                </span>
            </div>
        </div>

        <h4 class="text-2xl font-semibold dark:text-white">Reserva #{{ $reserva->id }}</h4>
        
        <!-- Información básica -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Información básica</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha: </span>
                    {{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Hora: </span>
                    {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Duración: </span>
                    {{ $reserva->duracion }} horas
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Total personas: </span>
                    @php
                        $totalPersonas = 0;
                        foreach ($reserva->mesas as $mesa) {
                            $totalPersonas += $mesa->Capacidad * $mesa->pivot->cantidad;
                        }
                    @endphp
                    {{ $totalPersonas }}
                </p>
            </div>
        </div>

        <!-- Detalle de mesas -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Mesas asignadas</h2>
            
            <div class="mt-3 overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-brown-700">
                            <th class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-left dark:text-white">Mesa</th>
                            <th class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-white">Capacidad</th>
                            <th class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-white">Cantidad</th>
                            <th class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-white">Total Personas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reserva->mesas as $mesa)
                            <tr class="dark:bg-brown-600">
                                <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 dark:text-gray-200">
                                    Mesa Nro: {{ $mesa->Nro }}
                                </td>
                                <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-gray-200">
                                    {{ $mesa->Capacidad }}
                                </td>
                                <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-gray-200">
                                    {{ $mesa->pivot->cantidad }}
                                </td>
                                <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-gray-200">
                                    {{ $mesa->Capacidad * $mesa->pivot->cantidad }}
                                </td>
                            </tr>
                        @endforeach
                        <!-- Fila de totales -->
                        <tr class="bg-gray-100 dark:bg-brown-700 font-semibold">
                            <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 dark:text-white" colspan="3">TOTAL</td>
                            <td class="border border-gray-300 dark:border-brown-500 px-4 py-2 text-center dark:text-white">
                                {{ $totalPersonas }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Auditoría -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Auditoría</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha de creación: </span>
                    {{ $reserva->created_at->format('d/m/Y H:i') }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha de actualización: </span>
                    {{ $reserva->updated_at->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
    </div>
@endsection