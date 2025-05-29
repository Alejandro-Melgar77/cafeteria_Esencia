@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Editar Receta #{{ $receta->nro }}</h1>
    </div>
    
    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí podrás modificar los detalles de la receta. Actualiza el producto asociado o los ingredientes 
                requeridos según sea necesario.
            </span>
        </div>
        
        @include('partials.errors')
        
        <form action="{{ route('recetas.update', $receta->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="nro" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Número de Receta
                </label>
                <input type="text" name="nro" id="nro" required maxlength="20" 
                    value="{{ old('nro', $receta->nro) }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('nro') outline-red-500 @enderror">
                @error('nro')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="producto_id" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Producto asociado
                </label>
                <select name="producto_id" id="producto_id" required
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('producto_id') outline-red-500 @enderror">
                    <option value="">Seleccionar producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" 
                            {{ old('producto_id', $receta->producto_id) == $producto->id ? 'selected' : '' }}>
                            {{ $producto->inventarios->nombre }} ({{ $producto->inventarios->id }})
                        </option>
                    @endforeach
                </select>
                @error('producto_id')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Ingredientes requeridos
                </label>
                
                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50 dark:bg-brown-600" id="ingredientes-container">
                    @foreach($ingredientes as $ingrediente)
                        @php
                            $ingredienteReceta = $receta->ingredientes->find($ingrediente->id);
                        @endphp
                        
                        <div class="ingrediente-row flex items-center gap-3 mb-3 p-2 hover:bg-gray-100 dark:hover:bg-brown-500 rounded">
                            <div class="flex items-center">
                                <input type="checkbox" id="ingrediente-{{ $ingrediente->id }}" 
                                    name="ingredientes[{{ $ingrediente->id }}][id]" 
                                    value="{{ $ingrediente->id }}"
                                    {{ $ingredienteReceta ? 'checked' : '' }}
                                    class="ingrediente-checkbox w-4 h-4 text-brown-600 rounded focus:ring-brown-500">
                            </div>
                            
                            <label for="ingrediente-{{ $ingrediente->id }}" 
                                class="flex-grow text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ $ingrediente->inventarios->nombre }}
                            </label>
                            
                            <div class="flex items-center gap-2">
                                <input type="number" step="0.01" min="0.1" 
                                    name="ingredientes[{{ $ingrediente->id }}][cantidad]" 
                                    class="cantidad-input w-24 px-2 py-1 rounded-lg outline outline-brown-500 disabled:bg-gray-100 disabled:opacity-50"
                                    placeholder="Cantidad"
                                    value="{{ $ingredienteReceta ? $ingredienteReceta->pivot->cantidad : '' }}"
                                    {{ $ingredienteReceta ? '' : 'disabled' }}>
                                
                                <span class="text-sm text-gray-600 dark:text-gray-300">
                                    {{ $ingrediente->unidad_medida }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                @error('ingredientes')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('recetas.index') }}"
                    class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Actualizar Receta
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleCheckboxChange() {
            const row = this.closest('.ingrediente-row');
            const cantidadInput = row.querySelector('.cantidad-input');
            
            cantidadInput.disabled = !this.checked;
            if (!this.checked) cantidadInput.value = '';
            
            if (this.checked) {
                setTimeout(() => {
                    cantidadInput.focus();
                    cantidadInput.select();
                }, 100);
            }
        }
        
        document.querySelectorAll('.ingrediente-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', handleCheckboxChange);
            
            if (checkbox.checked) {
                const row = checkbox.closest('.ingrediente-row');
                const cantidadInput = row.querySelector('.cantidad-input');
                cantidadInput.disabled = false;
            }
        });
        
        document.getElementById('ingredientes-container').addEventListener('change', function(e) {
            if (e.target.classList.contains('ingrediente-checkbox')) {
                handleCheckboxChange.call(e.target);
            }
        });
    });
</script>
@endsection