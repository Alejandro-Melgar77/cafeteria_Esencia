@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Mis Compras y Feedbacks</h4>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver todas tus compras registradas y gestionar los feedbacks asociados a cada una.
                </span>
            </div>

            <div class="relative flex flex-col w-full h-full overflow-y-auto text-gray-700 bg-white border border-gray-200 rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    ID Nota
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Fecha
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Importe
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Calificación
                                </p>
                            </th>
                            <th class="p-4 border-b border-gray-400 bg-gray-100">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Comentario
                                </p>
                            </th>
                            <th class="p-3 border-b border-gray-400 bg-gray-100 w-48">
                                <p class="block text-sm font-semibold leading-none text-gray-500">
                                    Acciones
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notasDeVenta as $nota)
                            <tr class="hover:bg-slate-50">
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $nota->id }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ \Carbon\Carbon::parse($nota->fecha)->format('d/m/Y') }}
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ number_format($nota->importe, 2) }} Bs.
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        @if ($nota->feedback)
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $nota->feedback->calificacion)
                                                        <x-heroicon-s-star class="h-5 w-5 text-yellow-400" />
                                                    @else
                                                        <x-heroicon-s-star class="h-5 w-5 text-gray-300" />
                                                    @endif
                                                @endfor
                                                <span class="ml-2">{{ $nota->feedback->calificacion }}/5</span>
                                            </div>
                                        @else
                                            <span class="text-gray-400">Sin calificar</span>
                                        @endif
                                    </p>
                                </td>
                                <td class="p-3 border-b border-gray-200">
                                    <p class="block text-sm text-slate-800">
                                        @if ($nota->feedback)
                                            {{ \Illuminate\Support\Str::limit($nota->feedback->descripcion, 30) }}
                                        @else
                                            <span class="text-gray-400">Sin comentario</span>
                                        @endif
                                    </p>
                                </td>
                                <td class="p-1 border-b border-gray-200">
                                    <div class="flex space-x-2 justify-center">
                                        @if ($nota->feedback)
                                            <!-- Editar feedback -->
                                            <a href="{{ route('feedbacks.edit', [$nota->feedback->id]) }}"
                                                class="flex items-center space-x-1 text-xs font-medium text-yellow-700 outline hover:text-yellow-900 p-2 rounded-lg">
                                                <x-heroicon-s-pencil class="h-4 w-4" />
                                                <span>Editar</span>
                                            </a>
                                            <!-- Eliminar feedback -->
                                            <form action="{{ route('feedbacks.destroy', [$nota->feedback->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="flex items-center space-x-1 text-xs font-medium text-red-700 outline hover:text-red-900 p-2 rounded-lg cursor-pointer"
                                                    type="submit"
                                                    onclick="return confirm('¿Estás seguro de eliminar este feedback?')">
                                                    <x-heroicon-s-trash class="h-4 w-4" />
                                                    <span>Eliminar</span>
                                                </button>
                                            </form>
                                        @else
                                            <!-- Crear feedback -->
                                            <a href="{{ route('feedbacks.create', ['nota_de_venta_id' => $nota->id]) }}"
                                                class="flex items-center space-x-1 text-xs font-medium text-green-700 outline hover:text-green-900 p-2 rounded-lg">
                                                <x-heroicon-s-plus class="h-4 w-4" />
                                                <span>Crear</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-4 text-center text-gray-500">
                                    No tienes notas de venta registradas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $notasDeVenta->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
@endsection