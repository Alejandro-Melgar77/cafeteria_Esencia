@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Editar Nota de Venta #{{ $notaDeVenta->id }}</h1>
    </div>
    
    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí podrás modificar los detalles de la nota de venta. Actualiza el importe, fecha, usuario, método de pago y los productos vendidos.
            </span>
        </div>
        
        @include('partials.errors')
        
        <form action="{{ route('nota_venta.update', $notaDeVenta->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Importe (ahora de solo lectura) -->
            <div class="mb-4">
                <label for="importe" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Importe Total
                </label>
                <input type="number" step="0.01" min="0" name="importe" id="importe" required 
                    value="{{ old('importe', $notaDeVenta->importe) }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('importe') outline-red-500 @enderror"
                    placeholder="0.00" readonly>
                @error('importe')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Fecha -->
            <div class="mb-4">
                <label for="fecha" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Fecha de Venta
                </label>
                <input type="date" name="fecha" id="fecha" required value="{{ old('fecha', $notaDeVenta->fecha) }}"
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('fecha') outline-red-500 @enderror">
                @error('fecha')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Usuario -->
            <div class="mb-4">
                <label for="usuario_id" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Usuario
                </label>
                <select name="usuario_id" id="usuario_id" required
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('usuario_id') outline-red-500 @enderror">
                    <option value="">Selecciona un usuario</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" 
                            {{ old('usuario_id', $notaDeVenta->usuario_id) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->Nombre }}
                        </option>
                    @endforeach
                </select>
                @error('usuario_id')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Método de Pago -->
            <div class="mb-4">
                <label for="metodo_pago_id" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Método de Pago
                </label>
                <select name="metodo_pago_id" id="metodo_pago_id" required
                    class="mt-1 w-full px-3 py-2 rounded-lg outline outline-brown-500 @error('metodo_pago_id') outline-red-500 @enderror">
                    <option value="">Selecciona un método de pago</option>
                    @foreach($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}" 
                            {{ old('metodo_pago_id', $notaDeVenta->metodo_pago_id) == $metodo->id ? 'selected' : '' }}>
                            {{ $metodo->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('metodo_pago_id')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Productos (Inventarios) -->
            <div class="mb-6">
                <label class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">
                    Productos Vendidos
                </label>
                <div class="space-y-4">
                    @foreach($inventarios as $inventario)
                    <div class="flex items-center gap-4 product-row" 
                         data-precio="{{ $inventario->productos->Precio_venta ?? 0 }}">
                        <input type="checkbox" name="inventarios[{{ $inventario->id }}][id]" 
                               id="inventario_{{ $inventario->id }}" 
                               value="{{ $inventario->id }}" 
                               class="form-checkbox h-5 w-5 text-brown-600 rounded focus:ring-brown-500"
                               {{ isset($selected[$inventario->id]) ? 'checked' : '' }}>
                        <label for="inventario_{{ $inventario->id }}" class="text-gray-700 dark:text-gray-200 flex-grow">
                            {{ $inventario->nombre }} 
                            <span class="text-sm text-gray-500 dark:text-gray-400 block">
                                Stock: {{ $inventario->stock }} | 
                                Precio: S/ {{ number_format($inventario->productos->Precio_venta ?? 0, 2) }}
                            </span>
                        </label>
                        <input type="number" name="inventarios[{{ $inventario->id }}][cantidad]" 
                               min="1" value="{{ isset($selected[$inventario->id]) ? $selected[$inventario->id]['cantidad'] : 1 }}" 
                               class="w-24 px-3 py-2 rounded-lg outline outline-brown-500 @error("inventarios.{$inventario->id}.cantidad") outline-red-500 @enderror">
                        @error("inventarios.{$inventario->id}.cantidad")
                            <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @endforeach
                </div>
                @error('inventarios')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('nota_venta.index') }}"
                    class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                    Cancelar
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Actualizar Nota de Venta
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const importeInput = document.getElementById('importe');
        
        // Actualizar importe cuando cambian los productos
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name^="inventarios"]');
        const cantidadInputs = document.querySelectorAll('input[type="number"][name^="inventarios"]');
        
        function actualizarImporte() {
            let total = 0;
            
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const row = checkbox.closest('.product-row');
                    const precio = parseFloat(row.dataset.precio) || 0;
                    const cantidadInput = row.querySelector('input[type="number"]');
                    const cantidad = parseInt(cantidadInput.value) || 0;
                    
                    total += precio * cantidad;
                }
            });
            
            importeInput.value = total.toFixed(2);
        }
        
        // Escuchar cambios en checkboxes y cantidades
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', actualizarImporte);
        });
        
        cantidadInputs.forEach(input => {
            input.addEventListener('input', actualizarImporte);
        });
        
        // Calcular importe inicial al cargar
        actualizarImporte();
        
        // Formatear importe cuando se pierde el foco
        importeInput.addEventListener('blur', function() {
            if (this.value) {
                this.value = parseFloat(this.value).toFixed(2);
            }
        });
    });
</script>
@endsection