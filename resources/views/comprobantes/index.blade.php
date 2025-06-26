@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Generar Comprobantes</h1>
        </div>

        <div class="content flex flex-col">
            <div class="flex py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás generar comprobantes para las notas de venta registradas en el sistema.
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-brown-200">
                    <thead class="bg-brown-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                Fecha
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                Importe
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                Usuario
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                Método de Pago
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-brown-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-brown-200">
                        @foreach($notasDeVenta as $nota)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-brown-900">
                                {{ $nota->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-brown-900">
                                {{ \Carbon\Carbon::parse($nota->fecha)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-brown-900">
                                S/ {{ number_format($nota->importe, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-brown-900">
                                {{ $nota->usuario->Nombre }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-brown-900">
                                {{ $nota->metodoPago->nombre }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('comprobantes.generar', $nota->id) }}" 
                                   class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 transition-colors">
                                    Generar Comprobante
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection