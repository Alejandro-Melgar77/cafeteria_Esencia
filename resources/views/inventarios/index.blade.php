@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8 border border-gray-200">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Inventario</h4>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aqui podras gestionar los productos e ingredientes del inventario, recuerda que los productos son
                    aquellos que se venden y los ingredientes son aquellos que se utilizan para preparar los productos.
                </span>
            </div>
        </div>
        <div class="flex w-full flex-col lg:flex-row lg:items-start">

            <div class="flex flex-col w-full lg:w-1/2 lg:pr-2 py-2">
                <div class="flex items-center justify-between py-2">
                    <h4 class="font-semibold text-xl">Productos</h4>
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('productos.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
                <div
                    class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        NOMBRE
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        FECHA (VCO)
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        PRECIO VENTA
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        STOCK
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $producto->inventarios->id }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $producto->inventarios->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $producto->inventarios->fecha_vco ? $producto->inventarios->fecha_vco : 'N/A' }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $producto->Precio_venta }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $producto->inventarios->stock }}
                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('productos.show', [$producto->id]) }}"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                                <x-heroicon-s-eye class="h-4 w-4" />
                                                {{-- <span>Ver</span> --}}
                                            </a>
                                            <a href="{{ route('productos.edit', [$producto->id]) }}"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                                <x-heroicon-s-pencil class="h-4 w-4" />
                                                {{-- <span>Editar</span> --}}
                                            </a>
                                            <form action="{{ route('productos.destroy', [$producto->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('Estas seguro de eliminar el ID: {{ $producto->id }}?')">
                                                    <x-heroicon-s-trash class="h-4 w-4" />
                                                    {{-- <span>Eliminar</span> --}}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-col w-full lg:w-1/2 lg:pl-2 py-2">
                <div class="flex justify-between items-center py-2">
                    <h4 class="font-semibold text-xl">Ingredientes</h4>
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('ingredientes.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
                <div
                    class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        NOMBRE
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        FECHA (VCO)
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        COSTO UNITARIO
                                    </p>
                                </th>
                                <th class="p-4 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500">
                                        STOCK
                                    </p>
                                </th>
                                <th class="p-3 border-b border-gray-400 bg-gray-100">
                                    <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingredientes as $ingrediente)
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $ingrediente->inventarios->id }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $ingrediente->inventarios->nombre }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $ingrediente->inventarios->fecha_vco ? $ingrediente->inventarios->fecha_vco : 'N/A' }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $ingrediente->Costo_Unitario }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-gray-200">
                                        <p class="block text-sm text-slate-800">
                                            {{ $ingrediente->inventarios->stock }}
                                        </p>
                                    </td>
                                    <td class="p-1 border-b border-gray-200 w-48">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('ingredientes.show', [$ingrediente->id]) }}"
                                                class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                                <x-heroicon-s-eye class="h-4 w-4" />
                                            </a>
                                            <a href="{{ route('ingredientes.edit', [$ingrediente->id]) }}"
                                                class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                                <x-heroicon-s-pencil class="h-4 w-4" />
                                            </a>
                                            <form action="{{ route('ingredientes.destroy', [$ingrediente->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('Estas seguro de eliminar el ID: {{ $ingrediente->id }}?')">
                                                    <x-heroicon-s-trash class="h-4 w-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
