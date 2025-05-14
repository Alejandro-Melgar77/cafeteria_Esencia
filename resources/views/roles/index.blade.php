@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="py-2">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h3 class="page-title">Roles</h3>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('welcome') }}">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Roles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title mb-0">Roles registrados</h4>
                    <a class="btn btn-success d-flex align-items-center gap-1" href="{{ route('roles.create') }}">
                        <i class="mdi mdi-plus mdi-18px"></i>
                        <span>Crear nuevo rol</span>
                    </a>
                </div>
            </div>
            <div class="px-4 py-2">
                <span class="text-muted fw-normal" style="font-size: 14px">
                    Aqui podras ver todos los roles registrados en el sistema, puedes crear nuevos roles o editar los
                    existentes, ademas puedes eliminar los roles que ya no necesites.
                </span>
            </div>
            <div class="table-responsive pt-4">
                <table class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CARGO</th>
                            <th>ACCIONES</th>
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
                                        <a class="btn btn-info btn-sm" href="{{ route('roles.show', [$rol->id]) }}"><i
                                                class="mdi mdi-eye"></i> Ver</a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('roles.edit', [$rol->id]) }}"><i
                                                class="mdi mdi-pencil"></i> Editar</a>
                                        <form method="POST" action="{{ route('roles.destroy', [$rol->id]) }}">
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
