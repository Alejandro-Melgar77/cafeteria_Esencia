@extends('layouts.app')

@section('content')
    <div class="col-12 py-4">
        <div class="card">
            <div class="card-body col-lg-6">
                <h4 class="card-title">Crear privilegio</h4>
                <form action="{{ route('privilegios.store') }}" method="POST">
                    @csrf
                    <div class=" mb-3">
                        <label for="Funcion" class="form-label">Funcion</label>
                        <input type="text" class="form-control" id="Funcion" name="Funcion" required>
                    </div>
                    <label for="rol" class="form-label">Roles</label>
                    <div class="mb-3 d-flex gap-4 align-items-center border py-2 px-4">
                        @foreach ($roles as $rol)
                            <div>
                                <label>{{ $rol->Cargo }}</label>
                                <input type="checkbox" class="" name="rol[{{ $rol->id }}]"
                                    value="{{ $rol->id }}">

                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary float-end">Crear privilegio</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
