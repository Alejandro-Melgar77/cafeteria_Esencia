@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Nueva Reserva</h1>
    </div>
    
    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí podrás crear una nueva reserva. Selecciona la fecha, duración, hora y las mesas requeridas
                con sus cantidades correspondientes.
            </span>
        </div>
        
        @include('partials.errors')
        
        <form action="{{ route('reservas.store') }}" method="POST">
            @csrf
            
            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Fecha de Reserva
                </label>
                <input type="date" name="fecha" id="fecha" required value="{{ old('fecha') }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('fecha') outline-red-500 @enderror">
                @error('fecha')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Duración -->
            <div class="mb-4">
                <label for="duracion" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Duración (horas)
                </label>
                <input type="number" step="0.5" min="0.5" name="duracion" id="duracion" required 
                    value="{{ old('duracion', 1) }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('duracion') outline-red-500 @enderror">
                @error('duracion')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Hora -->
            <div class="mb-4">
                <label for="hora" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Hora de Inicio
                </label>
                <input type="time" name="hora" id="hora" required value="{{ old('hora') }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('hora') outline-red-500 @enderror">
                @error('hora')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Sección de Mesas -->
            <div class="mb-6">
                <label class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Mesas Requeridas
                </label>
                
                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50 dark:bg-brown-600" id="mesas-container">
                    @foreach($mesas as $mesa)
                        <div class="mesa-row flex items-center gap-3 mb-3 p-2 hover:bg-gray-100 dark:hover:bg-brown-500 rounded">
                            <div class="flex items-center">
                                <input type="checkbox" id="mesa-{{ $mesa->id }}" 
                                    name="mesas[{{ $mesa->id }}][id]" 
                                    value="{{ $mesa->id }}"
                                    class="mesa-checkbox w-4 h-4 text-brown-600 rounded focus:ring-brown-500">
                            </div>
                            
                            <label for="mesa-{{ $mesa->id }}" 
                                class="flex-grow text-sm font-medium text-gray-700 dark:text-gray-200">
                                Mesa Nro: {{ $mesa->Nro }} (Capacidad: {{ $mesa->Capacidad }})
                            </label>
                            
                            <div class="flex items-center gap-2">
                                <input type="number" min="1" value="1"
                                    name="mesas[{{ $mesa->id }}][cantidad]" 
                                    class="cantidad-input w-24 px-2 py-1 rounded-lg outline outline-brown-500 disabled:bg-gray-100 disabled:opacity-50"
                                    placeholder="Cantidad"
                                    disabled>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                @error('mesas')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('reservas.index') }}"
                    class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Crear Reserva
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Script para habilitar campos de cantidad al seleccionar la mesa
    document.addEventListener('DOMContentLoaded', function() {
        function handleMesaCheckboxChange() {
            const row = this.closest('.mesa-row');
            const cantidadInput = row.querySelector('.cantidad-input');
            
            cantidadInput.disabled = !this.checked;
            if (!this.checked) cantidadInput.value = '';
            
            // Enfocar automáticamente el campo de cantidad cuando se marca
            if (this.checked) {
                setTimeout(() => {
                    cantidadInput.focus();
                    cantidadInput.select();
                }, 100);
            }
        }
        
        // Asignar eventos a los checkboxes existentes
        document.querySelectorAll('.mesa-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', handleMesaCheckboxChange);
            
            // Si hay old input, marcamos el checkbox y habilitamos el input
            const mesaId = checkbox.value;
            const oldMesas = @json(old('mesas', []));
            if (oldMesas[mesaId]) {
                checkbox.checked = true;
                const cantidadInput = checkbox.closest('.mesa-row').querySelector('.cantidad-input');
                cantidadInput.disabled = false;
                cantidadInput.value = oldMesas[mesaId]['cantidad'];
            }
        });
        
        // Delegación de eventos para futuros elementos (si se añadieran dinámicamente)
        document.getElementById('mesas-container').addEventListener('change', function(e) {
            if (e.target.classList.contains('mesa-checkbox')) {
                handleMesaCheckboxChange.call(e.target);
            }
        });
    });
</script>
@endsection