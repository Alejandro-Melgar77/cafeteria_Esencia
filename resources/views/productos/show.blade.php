@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <!-- Título y botón Volver -->
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos del producto</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('productos.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles completos del producto.
                </span>
            </div>
        </div>

        <!-- ID del producto -->
        <h4 class="text-2xl font-semibold">Producto # {{ $producto->inventarios->id }}</h4>
        
        <!-- Sección de Información Básica -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Información básica</h2>
            <p><span class="font-medium">Código: </span>{{ $producto->inventarios->id }}</p>
            <p><span class="font-medium">Nombre: </span>{{ $producto->inventarios->nombre }}</p>
            <p>
                <span class="font-medium">Fecha Vencimiento: </span>
                @if($producto->inventarios->fecha_vco)
                    {{ \Carbon\Carbon::parse($producto->inventarios->fecha_vco)->format('d/m/Y') }}
                @else
                    N/A
                @endif
            </p>
        </div>

        <!-- Sección de Datos Económicos -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Datos económicos</h2>
            <p><span class="font-medium">Costo unitario: </span>${{ number_format($producto->inventarios->costo, 2) }}</p>
            <p><span class="font-medium">Costo de producción: </span>${{ number_format($producto->Costo_produccion, 2) }}</p>
            <p><span class="font-medium">Precio de venta: </span>${{ number_format($producto->Precio_venta, 2) }}</p>
            <p><span class="font-medium">Porcentaje de utilidad: </span>{{ $producto->Porcentaje_utilidad }} %</p>
            <p><span class="font-medium">Stock disponible: </span>{{ $producto->inventarios->stock }} unidades</p>
        </div>

        <!-- Sección de Auditoría -->
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Auditoría</h2>
            <p><span class="font-medium">Fecha de creación: </span>
                {{ $producto->inventarios->created_at->format('d/m/Y H:i') }}
            </p>
            <p><span class="font-medium">Fecha de actualización: </span>
                {{ $producto->inventarios->updated_at->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>
@endsection