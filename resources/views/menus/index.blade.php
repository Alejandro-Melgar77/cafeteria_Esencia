@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Menús registrados</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('menus.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todos los menús registrados en el sistema. Puedes crear nuevos menús, 
                    editar los existentes o eliminar aquellos que ya no necesites.
                </span>
            </div>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-4 border-b border-gray-400">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Fecha
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Productos/Ingredientes
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400">
                                <p class="block text-sm font-semibold leading-none text-gray-500">Acciones</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800 font-medium">
                                        {{ $menu->id }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ \Carbon\Carbon::parse($menu->fecha)->format('d M Y') }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $menu->inventarios->count() }} items
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('menus.show', $menu->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('menus.edit', $menu->id) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('¿Estás seguro de eliminar el menú del {{ \Carbon\Carbon::parse($menu->fecha)->format('d/m/Y') }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">
                                    No hay menús registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $menus->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection