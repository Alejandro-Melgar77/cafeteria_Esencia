@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Detalles del menú</h4>
                <div class="flex justify-center items-center">
                    <a href="{{ route('menus.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles completos del menú, incluyendo la fecha y todos los productos/ingredientes asociados con sus cantidades.
                </span>
            </div>
        </div>

        <div class="flex flex-col border border-gray-200 rounded-lg p-6 mt-2">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-2xl font-semibold">Menú #{{ $menu->id }}</h4>
                    <p class="mt-1 text-gray-600">
                        Fecha: {{ \Carbon\Carbon::parse($menu->fecha)->format('d/m/Y') }}
                    </p>
                </div>
                <div class="bg-gray-100 px-3 py-1 rounded-full text-sm font-medium">
                    {{ $menu->inventarios->count() }} items
                </div>
            </div>
        </div>

        <div class="flex flex-col border border-gray-200 rounded-lg p-6 mt-6">
            <h2 class="font-semibold text-lg mb-4">Productos e Ingredientes</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Producto/Ingrediente
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unidad
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($menu->inventarios as $inventario)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $inventario->nombre }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $inventario->tipo }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $inventario->pivot->cantidad }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $inventario->unidad_medida }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50 border-t border-gray-200">
                        <tr>
                            <td colspan="2" class="px-6 py-3 text-sm font-semibold text-right">Totales:</td>
                            <td class="px-6 py-3 text-sm font-bold">{{ $menu->inventarios->sum('pivot.cantidad') }}</td>
                            <td class="px-6 py-3 text-sm text-gray-500">unidades</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="border border-gray-200 rounded-lg p-6">
                <h2 class="font-semibold text-lg mb-4">Resumen</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Total de productos</span>
                        <span class="text-lg font-bold">{{ $menu->inventarios->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Cantidad total</span>
                        <span class="text-lg font-bold">
                            {{ $menu->inventarios->sum('pivot.cantidad') }} unidades
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tipos de productos</span>
                        <span class="text-lg font-bold">
                            {{ $menu->inventarios->unique('tipo')->count() }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg p-6 md:col-span-2">
                <h2 class="font-semibold text-lg mb-4">Auditoría</h2>
                <dl class="space-y-3">
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <dt class="font-medium">Fecha de creación</dt>
                        <dd class="text-sm">{{ $menu->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div class="flex justify-between items-center pb-2 border-b border-gray-100">
                        <dt class="font-medium">Fecha de actualización</dt>
                        <dd class="text-sm">{{ $menu->updated_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div class="flex justify-between items-center">
                        <dt class="font-medium">Creado por</dt>
                        <dd class="text-sm">{{ $menu->user->name ?? 'Sistema' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection