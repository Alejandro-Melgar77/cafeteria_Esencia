@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos de la mesa</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('mesas.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles de la mesa.
                </span>
            </div>
        </div>

        <h4 class="text-2xl font-semibold">Mesa # {{ $mesa->id }}</h4>
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg">Detalle</h2>
            <p><span class="font-medium">Número: </span>{{ $mesa->Nro }}</p>
            <p><span class="font-medium">Capacidad: </span>{{ $mesa->Capacidad }} personas</p>
        </div>

        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <div class="mb-4">
                <h2 class="font-semibold text-lg">Auditoría</h2>
                <dl class="flex flex-col space-y-2">
                    <p><span class="font-medium">Fecha de creación: </span>
                        {{ $mesa->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p><span class="font-medium">Fecha de actualización:
                        </span>{{ $mesa->updated_at->format('d/m/Y H:i') }}
                    </p>
                </dl>
            </div>
        </div>
    </div>
@endsection