@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Privilegios registrados</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('privilegios.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aqui podras ver todos los privilegios registrados en el sistema, puedes crear nuevos privilegios o
                    editar los existentes, ademas puedes eliminar los privilegios que ya no necesites.
                </span>
            </div>


            <form method="GET" action="{{ route('privilegios.index') }}" class="relative w-full sm:w-80 mb-6">
                <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar privilegio..."
                    class="w-full pl-10 pr-4 py-2 text-sm text-gray-800 dark:text-gray-100 bg-white dark:bg-brown-700 border border-gray-300 dark:border-brown-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-600 focus:border-transparent transition-all duration-200" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </div>
            </form>



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
                                    Cargo
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($privilegios as $privilegio)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $privilegio->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $privilegio->Funcion }}
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('privilegios.show', [$privilegio->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                        </a>
                                        <a href="{{ route('privilegios.edit', [$privilegio->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                        </a>
                                        <form action="{{ route('privilegios.destroy', [$privilegio->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('Estas seguro de eliminar el ID: {{ $privilegio->id }}?')">
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

            <div class="mt-4">
                {{ $privilegios->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection
