@extends('layouts.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h3 class="page-title">Roles</h3>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 p-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Roles registrados</h4>
                    <a class="btn btn-primary" href="{{ route('roles.create') }}">Crear nuevo rol</a>
                </div>
            </div>
            <div class="table-responsive table-striped p-4">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th class="border-top-0">ID</th>
                            <th class="border-top-0">CARGO</th>
                            <th class="border-top-0">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td class="text-center align-middle">{{ $rol->id }}</td>
                                <td class="text-center align-middle"><span>{{ $rol->Cargo }}</span></td>
                                {{-- <td class="txt-oflo">April 19, 2021</td> --}}
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-warning" href="{{ route('roles.edit', [$rol->id]) }}">editar</a>
                                        <form method="POST" action="{{ route('roles.destroy', [$rol->id]) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="confirm('estas seguro?') ">eliminar</button>
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
