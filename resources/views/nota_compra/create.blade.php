// resources/views/nota_compra/create.blade.php
@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Nueva Nota de Compra</h1>
    </div>

    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí puedes registrar una nueva nota de compra. Completa la información requerida a continuación.
            </span>
        </div>

        @include('partials.errors')

        <form action="{{ route('nota_compra.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="proveedor_id" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="w-full rounded-lg px-3 py-2 outline-1 outline-brown-300 focus:outline-2 focus:outline-orange-700">
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="metodo_pago_id" class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">Método de Pago</label>
                <select name="metodo_pago_id" id="metodo_pago_id" class="w-full rounded-lg px-3 py-2 outline-1 outline-brown-300 focus:outline-2 focus:outline-orange-700">
                    <option value="">Seleccione un método</option>
                    @foreach($metodos_pago as $metodo)
                        <option value="{{ $metodo->id }}">{{ $metodo->nombre }} ({{ $metodo->saldo }} Bs)</option>
                    @endforeach
                </select>
            </div>

            <div id="items-container">
                <h4 class="mb-2 text-base font-semibold">Productos o Ingredientes:</h4>
                <div class="item-row mb-4 flex flex-wrap gap-2">
                    
                    <select name="items[0][id]" class="rounded-lg px-2 py-1">
                        @foreach($productos as $producto)
                            <option value="{{ $producto->inventarios->id }}">{{ $producto->inventarios->nombre }}</option>
                        @endforeach
                        @foreach($ingredientes as $ingrediente)
                            <option value="{{ $ingrediente->inventarios->id }}">{{ $ingrediente->inventarios->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][cantidad]" placeholder="Cantidad" class="rounded-lg px-2 py-1 w-28">
                    <input type="number" name="items[0][precio_unitario]" placeholder="Precio Unitario" class="rounded-lg px-2 py-1 w-36">
                </div>
            </div>

            <button type="button" class="mb-4 px-4 py-2 bg-brown-500 text-white rounded-lg hover:bg-brown-600" onclick="agregarItem()">
                + Agregar ítem
            </button>

            <div class="flex justify-end gap-2 pt-4">
                <a href="{{ route('nota_compra.create') }}" class="px-4 py-2 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Registrar Compra
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let contador = 1;
    function agregarItem() {
        const container = document.getElementById('items-container');
        const row = document.createElement('div');
        row.classList.add('item-row', 'mb-4', 'flex', 'flex-wrap', 'gap-2');
        row.innerHTML = `
            
            <select name="items[${contador}][id]" class="rounded-lg px-2 py-1">
                @foreach($productos as $producto)
                    <option value="{{ $producto->inventarios->id }}">{{ $producto->inventarios->nombre }}</option>
                @endforeach
                @foreach($ingredientes as $ingrediente)
                    <option value="{{ $ingrediente->inventarios->id }}">{{ $ingrediente->inventarios->nombre }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${contador}][cantidad]" placeholder="Cantidad" class="rounded-lg px-2 py-1 w-28">
            <input type="number" name="items[${contador}][precio_unitario]" placeholder="Precio Unitario" class="rounded-lg px-2 py-1 w-36">
        `;
        container.appendChild(row);
        contador++;
    }
</script>
@endsection
