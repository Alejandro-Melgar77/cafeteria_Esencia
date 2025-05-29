@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <!-- Título y botón Volver -->
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos del ingrediente</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('ingredientes.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles completos del ingrediente.
                </span>
            </div>
        </div>

        <!-- ID del ingrediente -->
        <h4 class="text-2xl font-semibold">Ingrediente # {{ $ingrediente->inventarios->id }}</h4>

        <!-- Sección de Información Básica -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Información básica</h2>
            <p><span class="font-medium">Código: </span>{{ $ingrediente->inventarios->id }}</p>
            <p><span class="font-medium">Nombre: </span>{{ $ingrediente->inventarios->nombre }}</p>
            <p>
                <span class="font-medium">Fecha Vencimiento: </span>
                @if ($ingrediente->inventarios->fecha_vco)
                    {{ \Carbon\Carbon::parse($ingrediente->inventarios->fecha_vco)->format('d/m/Y') }}
                @else
                    N/A
                @endif
            </p>
            <p><span class="font-medium">Unidad Medida: </span>{{ $ingrediente->Unidad_Medida }}</p>
            <p><span class="font-medium">Costo Unitario: </span>{{ $ingrediente->Costo_Unitario }}</p>
            <p><span class="font-medium">Costo Promedio: </span>{{ $ingrediente->Costo_Promedio }}</p>
        </div>

        <!-- Sección de Datos Económicos -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Datos económicos</h2>
            <p><span class="font-medium">Costo unitario: </span>${{ number_format($ingrediente->inventarios->costo, 2) }}
            </p>
            <p><span class="font-medium">Stock disponible: </span>{{ $ingrediente->inventarios->stock }} unidades</p>
        </div>

        <!-- Sección de Auditoría -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Auditoría</h2>
            <p><span class="font-medium">Fecha de creación: </span>
                {{ $ingrediente->inventarios->created_at->format('d/m/Y H:i') }}
            </p>
            <p><span class="font-medium">Fecha de actualización: </span>
                {{ $ingrediente->inventarios->updated_at->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>
@endsection
