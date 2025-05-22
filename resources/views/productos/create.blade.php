@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Crear nuevo producto</h4>
                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf
                    <div class=" mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class=" mb-3">
                        <label for="fecha_vco" class="form-label">Fecha</label>
                        <input type="text" class="form-control" id="fecha_vco" name="fecha_vco" required>
                    </div>
                    <div class=" mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="text" class="form-control" id="costo" name="costo" required>
                    </div>
                    <div class=" mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" required>
                    </div>
                    {{-- producto --}}
                    <div class=" mb-3">
                        <label for="Precio_venta" class="form-label">Precio Venta</label>
                        <input type="text" class="form-control" id="Precio_venta" name="Precio_venta" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Costo_produccion" class="form-label">Costo Produccion</label>
                        <input type="text" class="form-control" id="Costo_produccion" name="Costo_produccion" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Porcentaje_utilidad" class="form-label">Porcentaje Utilidad</label>
                        <input type="text" class="form-control" id="Porcentaje_utilidad" name="Porcentaje_utilidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Crear producto</button>
                </form>
                
                @if($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
