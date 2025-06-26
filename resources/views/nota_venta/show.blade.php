@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl dark:text-white">Detalles de la Nota de Venta</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('nota_venta.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light dark:text-gray-300">
                    Aquí podrás ver los detalles completos de la nota de venta, incluyendo el usuario asociado, 
                    el método de pago utilizado y los productos vendidos.
                </span>
            </div>
        </div>

        <h4 class="text-2xl font-semibold dark:text-white">Nota de Venta #{{ $notaDeVenta->id }}</h4>
        
        <!-- Información básica -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Información básica</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Importe: </span>
                    S/ {{ number_format($notaDeVenta->importe, 2) }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha: </span>
                    {{ \Carbon\Carbon::parse($notaDeVenta->fecha)->format('d/m/Y') }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Usuario: </span>
                    {{ $notaDeVenta->usuario->Nombre ?? 'N/A' }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Método de Pago: </span>
                    {{ $notaDeVenta->metodoPago->nombre }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Total Productos: </span>
                    {{ $notaDeVenta->inventarios->count() }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Total Unidades: </span>
                    {{ $notaDeVenta->inventarios->sum('pivot.cantidad') }}
                </p>
            </div>
        </div>

        <!-- Productos Vendidos -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Productos Vendidos</h2>
            
            @if($notaDeVenta->inventarios->count() > 0)
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-300">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-brown-700 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">Producto</th>
                                <th scope="col" class="px-6 py-3">Cantidad</th>
                                <th scope="col" class="px-6 py-3">Precio Unitario</th>
                                <th scope="col" class="px-6 py-3">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notaDeVenta->inventarios as $inventario)
                                <tr class="bg-white border-b dark:bg-brown-600 dark:border-brown-500">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $inventario->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $inventario->pivot->cantidad }}
                                    </td>
                                    <td class="px-6 py-4">
                                        S/ {{ number_format($inventario->productos->Precio_venta, 2) }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        S/ {{ number_format($inventario->productos->Precio_venta * $inventario->pivot->cantidad, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50 dark:bg-brown-700">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right font-bold">TOTAL:</td>
                                <td class="px-6 py-3 font-bold text-gray-900 dark:text-white">
                                    S/ {{ number_format($notaDeVenta->importe, 2) }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-300">No se registraron productos en esta venta.</p>
            @endif
        </div>

        <!-- Detalle del usuario -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Detalles del Usuario</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Nombre: </span>
                        {{ $notaDeVenta->usuario->Nombre ?? 'N/A' }}
                    </p>
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Email: </span>
                        {{ $notaDeVenta->usuario->Email ?? 'N/A' }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Teléfono: </span>
                        {{ $notaDeVenta->usuario->Telefono ?? 'N/A' }}
                    </p>
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Rol: </span>
                        {{ $notaDeVenta->usuario->rol->Cargo ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Detalle de método de pago -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Detalles del Método de Pago</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">ID: </span>
                        {{ $notaDeVenta->metodoPago->id }}
                    </p>
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Nombre: </span>
                        {{ $notaDeVenta->metodoPago->nombre }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Descripción: </span>
                        {{ $notaDeVenta->metodoPago->descripcion ?? 'Sin descripción' }}
                    </p>
                    <p class="dark:text-gray-200">
                        <span class="font-medium dark:text-gray-300">Saldo actual: </span>
                        S/ {{ number_format($notaDeVenta->metodoPago->saldo, 2) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Auditoría -->
        <div class="flex flex-col border border-gray-200 dark:border-brown-500 rounded-lg p-4 mt-2 bg-gray-50 dark:bg-brown-600">
            <h2 class="font-semibold text-lg mb-2 dark:text-white">Auditoría</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha de creación: </span>
                    {{ $notaDeVenta->created_at->format('d/m/Y H:i') }}
                </p>
                <p class="dark:text-gray-200">
                    <span class="font-medium dark:text-gray-300">Fecha de actualización: </span>
                    {{ $notaDeVenta->updated_at->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
    </div>
@endsection