@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Editar rol # {{ $rol->id }}</h4>
                <form action="{{ route('roles.update', [$rol->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class=" mb-3">
                        <label for="Cargo" class="form-label">Cargo</label>
                        <input type="text" class="form-control" id="Cargo" name="Cargo" required
                            value="{{ $rol->Cargo }}">
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Modificar rol</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
