@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="py-2">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Clientes</h3>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('welcome') }}">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Clientes registrados</h4>
                    <a class="btn btn-success d-flex align-items-center gap-1" href="{{ route('clientes.create') }}">
                        <i class="mdi mdi-plus mdi-18px"></i>
                        <span>Registrar nuevo cliente</span>
                    </a>
                </div>
            </div>
            <div class="px-4 py-2">
                <span class="text-muted fw-normal" style="font-size: 14px">
                    Aqui podras ver todos los clientes registrados en el sistema, puedes crear nuevos clientes o editar
                    los existentes, ademas puedes eliminar los clientes que ya no necesites.
                </span>
            </div>
            <div class="table-responsive pt-4">
                <table class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>TELEFONO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="text-center align-middle">{{ $cliente->id }}</td>
                                <td class="text-center align-middle"><span>{{ $cliente->Nombre }}</span></td>
                                <td class="text-center align-middle"><span>{{ $cliente->Email }}</span></td>
                                <td class="text-center align-middle"><span>{{ $cliente->Telefono }}</span></td>
                                {{-- <td class="txt-oflo">April 19, 2021</td> --}}
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('usuarios.show', [$cliente->id]) }}"><i class="mdi mdi-eye"></i>
                                            Ver</a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('usuarios.edit', [$cliente->id]) }}"><i
                                                class="mdi mdi-pencil"></i> Editar</a>
                                        <form method="POST" action="{{ route('usuarios.destroy', [$cliente->id]) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit"
                                                onclick="return confirm('estas seguro?') "><i class="mdi mdi-delete"></i>
                                                Eliminar</button>
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
