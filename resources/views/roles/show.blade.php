@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Rol # {{ $rol->id }}</h4>
                {{-- descripcion del rol de la variable $rol --}}
                <p class="card-text">Cargo: {{ $rol->Cargo }}</p>
                <p class="card-text">Fecha de creacion: {{ $rol->created_at }}</p>
                <p class="card-text">Fecha de actualizacion: {{ $rol->updated_at }}</p>
                <p class="card-text">Estado: {{ $rol->Estado }}</p>
                <p class="card-text">Privilegios:</p>
                {{-- lista de privilegios --}}
                @php
                    $privilegios = collect($privilegios);
                @endphp
                @if ($privilegios->isEmpty())
                    <p>No tiene privilegios asignados</p>
                @else
                    @foreach ($privilegios as $privilegio)
                        <p>{{ $privilegio->Funcion }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
