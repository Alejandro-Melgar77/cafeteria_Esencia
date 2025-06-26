@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos del método de pago</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('metodo_pago.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles del método de pago.
                </span>
            </div>
        </div>

        <h4 class="text-2xl font-semibold">Método de pago # {{ $metodoPago->id }}</h4>
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg">Detalle</h2>
            <p><span class="font-medium">Nombre: </span>{{ $metodoPago->nombre }}</p>
            <p><span class="font-medium">Saldo: </span>{{ number_format($metodoPago->saldo, 2) }} Bs.</p>
            <p><span class="font-medium">Descripción: </span>{{ $metodoPago->descripcion ?? 'Sin descripción' }}</p>
        </div>

        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2">
            <div class="mb-4">
                <h2 class="font-semibold text-lg">Auditoría</h2>
                <dl class="flex flex-col space-y-2">
                    <p><span class="font-medium">Fecha de creación: </span>
                        {{ $metodoPago->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p><span class="font-medium">Fecha de actualización: </span>
                        {{ $metodoPago->updated_at->format('d/m/Y H:i') }}
                    </p>
                </dl>
            </div>
        </div>
    </div>
@endsection