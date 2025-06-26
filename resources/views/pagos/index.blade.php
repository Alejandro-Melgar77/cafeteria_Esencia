@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl dark:text-white">Movimientos de dinero</h4>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light dark:text-gray-300">
                    Aquí podrás ver todas las entradas (ventas) y salidas (compras) de dinero registradas en el sistema.
                </span>
            </div>

            <!-- Sección de Ventas (Entradas) -->
            <div class="mb-8">
                <h5 class="font-semibold text-lg mb-4 dark:text-white">Entradas (Ventas)</h5>
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
                                        IMPORTE
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                        FECHA
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                        MÉTODO DE PAGO
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">ACCIONES</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ventas as $venta)
                                <tr class="hover:bg-slate-50 dark:hover:bg-brown-500">
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200 font-medium">
                                            #{{ $venta->id }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm font-medium text-green-600 dark:text-green-400">
                                            S/ {{ number_format($venta->importe, 2) }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200">
                                            {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200">
                                            {{ $venta->metodoPago->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 dark:border-brown-400 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('nota_venta.show', $venta->id) }}"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 dark:text-cyan-400 outline hover:text-cyan-900 dark:hover:text-cyan-300 p-2 rounded-lg">
                                                <x-heroicon-s-eye class="h-4 w-4" />
                                            </a>
                                            <a href="{{ route('nota_venta.edit', $venta->id) }}"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 dark:text-yellow-400 outline hover:text-yellow-900 dark:hover:text-yellow-300 p-2 rounded-lg">
                                                <x-heroicon-s-pencil class="h-4 w-4" />
                                            </a>
                                            <form action="{{ route('nota_venta.destroy', $venta->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 dark:text-red-400 outline hover:text-red-900 dark:hover:text-red-300 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('¿Estás seguro de eliminar la venta #{{ $venta->id }}?')">
                                                    <x-heroicon-s-trash class="h-4 w-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-300">
                                        No hay ventas registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Paginación Ventas -->
                @if($ventas->hasPages())
                    <div class="mt-4">
                        {{ $ventas->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>

            <!-- Sección de Compras (Salidas) -->
            <div>
                <h5 class="font-semibold text-lg mb-4 dark:text-white">Salidas (Compras)</h5>
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
                                        MONTO TOTAL
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                        FECHA
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                        MÉTODO DE PAGO
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                    <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">ACCIONES</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compras as $compra)
                                <tr class="hover:bg-slate-50 dark:hover:bg-brown-500">
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200 font-medium">
                                            #{{ $compra->id }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm font-medium text-red-600 dark:text-red-400">
                                            S/ {{ number_format($compra->monto_total, 2) }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200">
                                            {{ \Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200">
                                            {{ $compra->metodoPago->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 dark:border-brown-400 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('nota_compra.show', $compra->id) }}"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 dark:text-cyan-400 outline hover:text-cyan-900 dark:hover:text-cyan-300 p-2 rounded-lg">
                                                <x-heroicon-s-eye class="h-4 w-4" />
                                            </a>
                                            <a href="{{ route('nota_compra.edit', $compra->id) }}"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 dark:text-yellow-400 outline hover:text-yellow-900 dark:hover:text-yellow-300 p-2 rounded-lg">
                                                <x-heroicon-s-pencil class="h-4 w-4" />
                                            </a>
                                            <form action="{{ route('nota_compra.destroy', $compra->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 dark:text-red-400 outline hover:text-red-900 dark:hover:text-red-300 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('¿Estás seguro de eliminar la compra #{{ $compra->id }}?')">
                                                    <x-heroicon-s-trash class="h-4 w-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-300">
                                        No hay compras registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Paginación Compras -->
                @if($compras->hasPages())
                    <div class="mt-4">
                        {{ $compras->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection