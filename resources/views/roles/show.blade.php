@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-xl shadow p-8">
        <div class="flex flex-col">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Datos del rol</h4>
                <div class="flex justify-center items-center space-x-2">
                    <a href="{{ route('roles.index') }}"
                        class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                        Volver a roles
                    </a>
                </div>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Aqui podras ver los detalles del rol.
                </span>
            </div>
        </div>

        <h4 class="text-2xl font-semibold">Rol # {{ $rol->id }}</h4>
        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            <h2 class="font-semibold text-lg">Detalle:</h2>
            <p><span class="font-medium">Cargo: </span>{{ $rol->Cargo }}</p>
            <p><span class="font-medium">Fecha de creacion:</span> {{ $rol->created_at }}</p>
            <p><span class="font-medium">Fecha de actualizacion: </span>{{ $rol->updated_at }}</p>
            <p><span class="font-medium">Estado: </span>{{ $rol->Estado }}</p>
        </div>

        <div class="flex flex-col border border-gray-200 rounded-lg p-4 mt-2">
            @php
                $privilegios = collect($privilegios);
            @endphp
            @if ($privilegios->isEmpty())
                <p>No tiene privilegios asignados</p>
            @else
                <h2 class="font-semibold text-lg">El rol tiene {{ $privilegios->count() }} privilegio(s) asignado(s):</h2>
                <ul class="grid grid-cols-1 lg:grid-cols-2 gap-x-6 list-disc ml-4 p-4">
                    @foreach ($privilegios as $privilegio)
                        <li>{{ $privilegio->Funcion }}</li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
@endsection
