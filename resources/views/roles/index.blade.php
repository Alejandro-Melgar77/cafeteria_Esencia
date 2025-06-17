@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-stone-900 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Roles registrados</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a class="flex items-center bg-green-500 p-2 rounded-lg hover:bg-green-600 text-white"
                        href="{{ route('roles.create') }}">
                        <x-heroicon-o-plus class="size-6" />
                    </a>
                    <button id="btn-modal" onclick="openModal()"
                        class="flex items-center bg-brown-500 p-2 rounded-lg hover:bg-brown-600 text-white cursor-pointer">
                        <x-heroicon-o-plus class="size-6" />
                    </button>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aqui podras ver todos los roles registrados en el sistema, puedes crear nuevos roles o editar los
                    existentes, ademas puedes eliminar los roles que ya no necesites.
                </span>
            </div>

            <div
                class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white dark:bg-stone-800 border border-gray-200 rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-stone-950">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    ID
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100 dark:bg-stone-950">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Cargo
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100 dark:bg-stone-950">
                                <p class="block text-sm font-semibold leading-none text-gray-500"></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $rol)
                            <tr class="hover:bg-slate-100 dark:hover:bg-stone-700 transition-colors duration-200">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-brown-800 dark:text-gray-200">
                                        {{ $rol->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-brown-800 dark:text-gray-200">
                                        {{ $rol->Cargo }}
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200 w-48">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('roles.show', [$rol->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-cyan-700 outline hover:text-cyan-900 p-2 rounded-lg">
                                            <x-heroicon-s-eye class="h-4 w-4" />
                                            {{-- <span>Ver</span> --}}
                                        </a>
                                        <a href="{{ route('roles.edit', [$rol->id]) }}"
                                            class="flex space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                            <x-heroicon-s-pencil class="h-4 w-4" />
                                            {{-- <span>Editar</span> --}}
                                        </a>
                                        <form action="{{ route('roles.destroy', [$rol->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                type="submit"
                                                onclick="return confirm('Estas seguro de eliminar el ID: {{ $rol->id }}?')">
                                                <x-heroicon-s-trash class="h-4 w-4" />
                                                {{-- <span>Eliminar</span> --}}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-3 text-center text-gray-500">
                                    No hay roles registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($roles->hasPages())
                <div class="mt-4">
                    {{ $roles->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>


    <!-- Modal -->
    <div id="modal-form"
        class="fixed inset-0 bg-black/30 flex items-center justify-center z-50  opacity-0 pointer-events-none transition-opacity duration-500">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-md shadow-lg relative">
            <!-- Botón para cerrar -->
            <button onclick="closeModal()"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 dark:hover:text-white text-xl size-8 cursor-pointer">
                &times;
            </button>

            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-white">Registrar nuevo rol</h2>

            <!-- Formulario -->
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <label for="Cargo"
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-200">Cargo</label>
                    <input type="text" name="Cargo" id="Cargo" value="{{ old('Cargo') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-600 sm:text-sm/6 @error('Cargo') outline-red-500 @enderror"
                        {{-- onchange="document.getElementById('Cargo').classList.remove('outline-red-500')" --}}>
                    @error('Cargo')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (old('Cargo'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                openModal();
            });
        </script>
    @endif
    <script>
        const modal = document.getElementById('modal-form');

        function openModal() {
            modal.classList.remove('pointer-events-none', 'opacity-0');
            modal.classList.add('opacity-100');
        }

        function closeModal() {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            // después de 1 segundo deshabilitamos interacciones
            setTimeout(() => modal.classList.add('pointer-events-none'), 1000);
        }
    </script>
@endsection
