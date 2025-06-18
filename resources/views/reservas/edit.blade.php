@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Editar Reserva #{{ $reserva->id }}</h1>
    </div>
    
    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí podrás modificar los detalles de la reserva. Actualiza la fecha, duración, hora o las mesas asignadas según sea necesario.
            </span>
        </div>
        
        @include('partials.errors')
        
        <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Fecha de Reserva
                </label>
                <input type="date" name="fecha" id="fecha" required value="{{ old('fecha', $reserva->fecha) }}"
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
                    value="{{ old('duracion', $reserva->duracion) }}"
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
                <input type="time" name="hora" id="hora" required value="{{ old('hora', $reserva->hora) }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('hora') outline-red-500 @enderror">
                @error('hora')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Sección de Mesas -->
            <div class="mb-6">
                <label class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Mesas Asignadas
                </label>
                
                <div class="border border-gray-300 rounded-lg p-4 bg-gray-50 dark:bg-brown-600" id="mesas-container">
                    @foreach($mesas as $mesa)
                        @php
                            $mesaReserva = $reserva->mesas->find($mesa->id);
                            // Si hay datos antiguos, usamos esos, si no, usamos los de la relación
                            $checked = false;
                            $cantidad = 1;

                            // Verificar si hay datos antiguos para esta mesa
                            $oldMesas = old('mesas', []);
                            if (array_key_exists($mesa->id, $oldMesas)) {
                                $checked = true;
                                $cantidad = $oldMesas[$mesa->id]['cantidad'];
                            } elseif ($mesaReserva) {
                                $checked = true;
                                $cantidad = $mesaReserva->pivot->cantidad;
                            }
                        @endphp
                        
                        <div class="mesa-row flex items-center gap-3 mb-3 p-2 hover:bg-gray-100 dark:hover:bg-brown-500 rounded">
                            <div class="flex items-center">
                                <input type="checkbox" id="mesa-{{ $mesa->id }}" 
                                    name="mesas[{{ $mesa->id }}][id]" 
                                    value="{{ $mesa->id }}"
                                    {{ $checked ? 'checked' : '' }}
                                    class="mesa-checkbox w-4 h-4 text-brown-600 rounded focus:ring-brown-500">
                            </div>
                            
                            <label for="mesa-{{ $mesa->id }}" 
                                class="flex-grow text-sm font-medium text-gray-700 dark:text-gray-200">
                                Mesa Nro: {{ $mesa->Nro }} (Capacidad: {{ $mesa->Capacidad }})
                            </label>
                            
                            <div class="flex items-center gap-2">
                                <input type="number" min="1" value="{{ $cantidad }}"
                                    name="mesas[{{ $mesa->id }}][cantidad]" 
                                    class="cantidad-input w-24 px-2 py-1 rounded-lg outline outline-brown-500 {{ $checked ? '' : 'disabled:bg-gray-100 disabled:opacity-50' }}"
                                    placeholder="Cantidad"
                                    {{ $checked ? '' : 'disabled' }}>
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
                    Actualizar Reserva
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function handleMesaCheckboxChange() {
            const row = this.closest('.mesa-row');
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
        
        document.querySelectorAll('.mesa-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', handleMesaCheckboxChange);
            
            // Si el checkbox ya está marcado al cargar, aseguramos que el input no esté deshabilitado
            if (checkbox.checked) {
                const row = checkbox.closest('.mesa-row');
                const cantidadInput = row.querySelector('.cantidad-input');
                cantidadInput.disabled = false;
            }
        });
        
        document.getElementById('mesas-container').addEventListener('change', function(e) {
            if (e.target.classList.contains('mesa-checkbox')) {
                handleMesaCheckboxChange.call(e.target);
            }
        });
    });
</script>
@endsection