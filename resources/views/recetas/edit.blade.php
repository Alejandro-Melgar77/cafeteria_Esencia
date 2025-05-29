@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Editar Producto #{{ $producto->inventario->id }}</h4>
                <form action="{{ route('productos.update', [$producto->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Campos del Inventario -->
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" 
                               value="{{ $producto->inventario->codigo }}" required maxlength="50">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               value="{{ $producto->inventario->nombre }}" required maxlength="100">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_vto" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" id="fecha_vto" name="fecha_vto" 
                               value="{{ $producto->inventario->fecha_vto }}">
                    </div>

                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control" id="costo" name="costo" step="0.01" 
                               value="{{ $producto->inventario->costo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" step="1" 
                               value="{{ $producto->inventario->stock }}" required min="0">
                    </div>

                    <!-- Campo específico de Producto -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" 
                               value="{{ $producto->precio }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Actualizar Producto</button>
                </form>
            </div>
        </div>
    </div>
@endsection