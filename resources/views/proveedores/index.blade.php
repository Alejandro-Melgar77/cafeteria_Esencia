@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Proveedores registrados</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('proveedores.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todos los proveedores registrados en el sistema, puedes crear nuevos proveedores o
                    editar los existentes, además puedes eliminar los proveedores que ya no necesites.
                </span>
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
                                    Nombre
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Email
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Negocio
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Teléfono
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedores as $proveedor)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $proveedor->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $proveedor->nombre }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $proveedor->email }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $proveedor->negocio }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $proveedor->telefono }}
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('proveedores.show', [$proveedor->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('proveedores.edit', [$proveedor->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('proveedores.destroy', [$proveedor->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('Estas seguro de eliminar el ID: {{ $proveedor->id }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">
                                    No hay proveedores disponibles.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($proveedores->hasPages())
                <div class="mt-4">
                    {{ $proveedores->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection
