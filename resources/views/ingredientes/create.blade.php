@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Crear nuevo ingrediente</h4>
                <form action="{{ route('ingredientes.store') }}" method="POST">
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
                    {{-- ingrediente --}}
                    <div class=" mb-3">
                        <label for="Unidad_Medida" class="form-label">Unidad Medida</label>
                        <input type="text" class="form-control" id="Unidad_Medida" name="Unidad_Medida" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Costo_Unitario" class="form-label">Costo Unitario</label>
                        <input type="text" class="form-control" id="Costo_Unitario" name="Costo_Unitario" required>
                    </div>
                    <div class=" mb-3">
                        <label for="Costo_Promedio" class="form-label">Costo Promedio</label>
                        <input type="text" class="form-control" id="Costo_Promedio" name="Costo_Promedio" required>
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
