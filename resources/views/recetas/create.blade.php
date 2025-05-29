@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Crear nuevo producto</h4>
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <!-- Campos comunes del inventario -->
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" 
                               required maxlength="50">
                    </div>
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                               required maxlength="100">
                    </div>
                    
                    <div class="mb-3">
                        <label for="fecha_vto" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" id="fecha_vto" name="fecha_vto">
                    </div>
                    
                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control" id="costo" name="costo" 
                               step="0.01" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" 
                               step="1" required min="0">
                    </div>

                    <!-- Campo específico de producto -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de Venta</label>
                        <input type="number" class="form-control" id="precio" name="precio" 
                               step="0.01" required>
                    </div>

                    <!-- Campo oculto para tipo -->
                    <input type="hidden" name="tipo" value="producto">

                    <button type="submit" class="btn btn-primary float-end">Crear Producto</button>
                </form>
            </div>
        </div>
    </div>
@endsection