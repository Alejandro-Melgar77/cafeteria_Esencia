@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
   
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos de la receta</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('recetas.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        < Volver </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aquí podrás ver los detalles completos de la receta, incluyendo los ingredientes requeridos.
                </span>
            </div>
        </div>

        
        <h4 class="text-2xl font-semibold">Receta # {{ $receta->nro }}</h4>
        
       
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Información básica</h2>
            <p><span class="font-medium">Número de receta: </span>{{ $receta->nro }}</p>
            <p><span class="font-medium">Producto asociado: </span>
                {{ $receta->producto->inventarios->nombre }} ({{ $receta->producto->inventarios->id }})
            </p>
        </div>

       
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Ingredientes requeridos</h2>
            
            <div class="mt-3">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Ingrediente</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Cantidad</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Unidad de Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($receta->ingredientes as $ingrediente)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $ingrediente->inventarios->nombre }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    {{ $ingrediente->pivot->cantidad }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    {{ $ingrediente->Unidad_Medida }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg mb-2">Auditoría</h2>
            <p><span class="font-medium">Fecha de creación: </span>
                {{ $receta->created_at->format('d/m/Y H:i') }}
            </p>
            <p><span class="font-medium">Fecha de actualización: </span>
                {{ $receta->updated_at->format('d/m/Y H:i') }}
            </p>
        </div>
    </div>
@endsection