@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title mb-4">Producto #{{ $producto->inventario->id }}</h4>
                
                <div class="mb-4">
                    <h5 class="text-muted">Información básica</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Código:</dt>
                        <dd class="col-sm-8">{{ $producto->inventario->codigo }}</dd>

                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $producto->inventario->nombre }}</dd>

                        <dt class="col-sm-4">Fecha Vencimiento:</dt>
                        <dd class="col-sm-8">
                            @if($producto->inventario->fecha_vto)
                                {{ \Carbon\Carbon::parse($producto->inventario->fecha_vto)->format('d/m/Y') }}
                            @else
                                N/A
                            @endif
                        </dd>
                    </dl>
                </div>

                <div class="mb-4">
                    <h5 class="text-muted">Datos económicos</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Costo unitario:</dt>
                        <dd class="col-sm-8">${{ number_format($producto->inventario->costo, 2) }}</dd>

                        <dt class="col-sm-4">Precio de venta:</dt>
                        <dd class="col-sm-8">${{ number_format($producto->precio, 2) }}</dd>

                        <dt class="col-sm-4">Stock disponible:</dt>
                        <dd class="col-sm-8">{{ $producto->inventario->stock }} unidades</dd>
                    </dl>
                </div>

                <div class="mb-4">
                    <h5 class="text-muted">Auditoría</h5>
                    <dl class="row">
                        <dt class="col-sm-4">Fecha creación:</dt>
                        <dd class="col-sm-8">{{ $producto->inventario->created_at->format('d/m/Y H:i') }}</dd>

                        <dt class="col-sm-4">Última actualización:</dt>
                        <dd class="col-sm-8">{{ $producto->inventario->updated_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>

                <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">
                    <i class="mdi mdi-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection