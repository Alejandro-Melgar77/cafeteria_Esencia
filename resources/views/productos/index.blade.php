@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="py-2">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Productos</h3>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('welcome') }}">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Productos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Productos registrados</h4>
                    <a class="btn btn-success d-flex align-items-center gap-1" href="{{ route('productos.create') }}">
                        <i class="mdi mdi-plus mdi-18px"></i>
                        <span>Crear nuevo producto</span>
                    </a>
                </div>
            </div>
            <div class="px-4 py-2">
                <span class="text-muted fw-normal" style="font-size: 14px">
                    Aquí podrás ver todos los productos registrados en el sistema. Puedes crear nuevos productos,
                    editar los existentes o eliminar aquellos que ya no necesites.
                </span>
            </div>
            <div class="table-responsive pt-4">
                <table class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                            <th>FECHA VTO.</th>
                            <th>COSTO</th>
                            <th>PRECIO</th>
                            <th>STOCK</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="text-center align-middle">{{ $producto->inventario->codigo }}</td>
                                <td class="text-center align-middle">{{ $producto->inventario->nombre }}</td>
                                <td class="text-center align-middle">
                                    @if($producto->inventario->fecha_vto)
                                        {{ \Carbon\Carbon::parse($producto->inventario->fecha_vto)->format('d/m/Y') }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    ${{ number_format($producto->inventario->costo, 2) }}
                                </td>
                                <td class="text-center align-middle">
                                    ${{ number_format($producto->precio, 2) }}
                                </td>
                                <td class="text-center align-middle">{{ $producto->inventario->stock }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-info btn-sm" 
                                           href="{{ route('productos.show', [$producto->id]) }}">
                                            <i class="mdi mdi-eye"></i> Ver
                                        </a>
                                        <a class="btn btn-warning btn-sm" 
                                           href="{{ route('productos.edit', [$producto->id]) }}">
                                            <i class="mdi mdi-pencil"></i> Editar
                                        </a>
                                        <form method="POST" 
                                              action="{{ route('productos.destroy', [$producto->id]) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('¿Estás seguro?')">
                                                <i class="mdi mdi-delete"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection