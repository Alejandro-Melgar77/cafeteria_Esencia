@extends('layouts.general')

@section('content')
<div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
    <div class="title text-xl font-semibold flex items-center">
        <h1>Nueva Nota de Salida</h1>
    </div>

    <div class="content flex flex-col">
        <div class="py-4">
            <span class="text-pretty text-xs font-light">
                Aquí puedes registrar una nueva nota de salida. Completa la información requerida a continuación.
            </span>
        </div>

        @include('partials.errors')

        <form action="{{ route('nota_salida.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                    <label for="descripcion"
                        class="mb-2 block text-base font-medium text-gray-800 dark:text-gray-200">descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" required
                        class="mt-1 w-full px-3 py-2 rounded-lg outline-1 
                            -outline-offset-1 outline-brown-300 focus:outline-2 
                            focus:outline-orange-700 sm:text-sm/6 @error('descripcion') outline-red-500 @enderror">
                    @error('descripcion')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                </div>
            <div id="items-container">
                <h4 class="mb-2 text-base font-semibold">Productos o Ingredientes:</h4>
                <div class="item-row mb-4 flex flex-wrap gap-2">
                    <select name="items[0][id]" class="rounded-lg px-2 py-1" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->inventarios->id }}">{{ $producto->inventarios->nombre }}</option>
                        @endforeach
                        @foreach($ingredientes as $ingrediente)
                            <option value="{{ $ingrediente->inventarios->id }}">{{ $ingrediente->inventarios->nombre }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][cantidad]" placeholder="Cantidad" class="rounded-lg px-2 py-1 w-28" min="1" required>
                </div>
            </div>

            <button type="button" class="mb-4 px-4 py-2 bg-brown-500 text-white rounded-lg hover:bg-brown-600" onclick="agregarItem()">
                + Agregar ítem
            </button>

            <div class="flex justify-end gap-2 pt-4">
                <button type="submit" class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Registrar Salida
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
            <select name="items[${contador}][id]" class="rounded-lg px-2 py-1" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->inventarios->id }}">{{ $producto->inventarios->nombre }}</option>
                @endforeach
                @foreach($ingredientes as $ingrediente)
                    <option value="{{ $ingrediente->inventarios->id }}">{{ $ingrediente->inventarios->nombre }}</option>
                @endforeach
            </select>
            <input type="number" name="items[${contador}][cantidad]" placeholder="Cantidad" class="rounded-lg px-2 py-1 w-28" min="1" required>
        `;
        container.appendChild(row);
        contador++;
    }
</script>
@endsection
