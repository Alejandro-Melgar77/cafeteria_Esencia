@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl dark:text-white">Notas de Venta registradas</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-brown-600 p-2 rounded-lg hover:bg-brown-700 text-white"
                        href="{{ route('nota_venta.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light dark:text-gray-300">
                    Aquí podrás ver todas las notas de venta registradas en el sistema. Cada nota está asociada a un usuario. 
                    Puedes crear nuevas notas, editar las existentes o eliminar aquellas que ya no necesites.
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
                                    USUARIO
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    MÉTODO DE PAGO
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">
                                    PRODUCTOS
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 dark:border-brown-500 bg-gray-100 dark:bg-brown-700">
                                <p class="block text-sm font-semibold leading-none text-gray-500 dark:text-gray-300">ACCIONES</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notasDeVenta as $nota)
                            <tr class="hover:bg-slate-50 dark:hover:bg-brown-500">
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200 font-medium">
                                        #{{ $nota->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200 font-semibold">
                                        S/ {{ number_format($nota->importe, 2) }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ \Carbon\Carbon::parse($nota->fecha)->format('d/m/Y') }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $nota->usuario->Nombre ?? 'N/A' }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <p class="block text-sm text-slate-800 dark:text-gray-200">
                                        {{ $nota->metodoPago->nombre }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200 dark:border-brown-400">
                                    <div class="flex flex-col">
                                        <p class="block text-sm text-slate-800 dark:text-gray-200">
                                            {{ $nota->inventarios_count }} productos
                                        </p>
                                        <p class="block text-xs text-gray-500 dark:text-gray-300">
                                            {{ $nota->total_items }} unidades
                                        </p>
                                    </div>
                                </td>
                                <td class="p-1 border-b border-gray-200 dark:border-brown-400 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('nota_venta.show', $nota->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 dark:text-cyan-400 outline hover:text-cyan-900 dark:hover:text-cyan-300 p-2 rounded-lg"
                                            title="Ver detalles">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('nota_venta.edit', $nota->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 dark:text-yellow-400 outline hover:text-yellow-900 dark:hover:text-yellow-300 p-2 rounded-lg"
                                            title="Editar">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('nota_venta.destroy', $nota->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 dark:text-red-400 outline hover:text-red-900 dark:hover:text-red-300 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar la nota de venta #{{ $nota->id }}?')"
                                                title="Eliminar">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500 dark:text-gray-300">
                                    No hay notas de venta disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            @if($notasDeVenta->hasPages())
                <div class="mt-4">
                    {{ $notasDeVenta->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection