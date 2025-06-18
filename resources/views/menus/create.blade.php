@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Nuevo menú</h1>
        </div>
        <div class="content flex flex-col">
            <div class="py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás registrar un nuevo menú para una fecha específica. Selecciona los productos o ingredientes que formarán parte del menú y especifica las cantidades necesarias.
                </span>
            </div>
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="fecha" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Fecha del menú</label>
                    <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('fecha') outline-red-500 @enderror">
                    @error('fecha')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                        Productos/Ingredientes del menú
                    </label>
                    
                    <div class="bg-gray-50 dark:bg-brown-600 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($inventarios as $inventario)
                                @php
                                    $item = $inventario->productos ?? $inventario->ingredientes;
                                @endphp
                                
                                @if($item)
                                <div class="flex items-start border-b pb-3">
                                    <div class="flex items-center h-5 mt-1">
                                        <input type="checkbox" 
                                               name="inventarios[{{ $inventario->id }}][id]" 
                                               value="{{ $inventario->id }}"
                                               class="inventario-checkbox w-4 h-4 text-brown-600 bg-gray-100 border-gray-300 rounded focus:ring-brown-500 
                                                      dark:focus:ring-brown-600 dark:ring-offset-gray-800 focus:ring-2 
                                                      dark:bg-gray-700 dark:border-gray-600"
                                               {{ isset(old('inventarios')[$inventario->id]) ? 'checked' : '' }}>
                                    </div>
                                    <div class="ml-3 w-full">
                                        <label for="inventario_{{ $inventario->id }}" 
                                               class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ $inventario->nombre }}
                                        </label>
                                        <div class="mt-1 flex items-center">
                                            <label for="cantidad_{{ $inventario->id }}" 
                                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">
                                                Cantidad:
                                            </label>
                                            <input type="number" 
                                                   name="inventarios[{{ $inventario->id }}][cantidad]" 
                                                   id="cantidad_{{ $inventario->id }}" 
                                                   min="1" 
                                                   value="{{ old('inventarios.'.$inventario->id.'.cantidad', 1) }}"
                                                   class="cantidad-input w-20 px-2 py-1 rounded-lg border outline-1 
                                                          -outline-offset-1 outline-brown-300 focus:outline-2 
                                                          focus:outline-orange-700 sm:text-sm/6 disabled:opacity-50"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    
                    @error('inventarios')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('menus.index') }}"
                        class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Registrar menú
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Habilitar/deshabilitar campos de cantidad
        document.querySelectorAll('.inventario-checkbox').forEach(checkbox => {
            const inventarioId = checkbox.value;
            const cantidadInput = document.getElementById(`cantidad_${inventarioId}`);
            
            // Estado inicial
            cantidadInput.disabled = !checkbox.checked;
            
            // Evento change
            checkbox.addEventListener('change', () => {
                cantidadInput.disabled = !checkbox.checked;
                if (!checkbox.checked) {
                    cantidadInput.value = '';
                }
            });
        });
    </script>
@endsection