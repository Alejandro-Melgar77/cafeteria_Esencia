@extends('layouts.auth2')

@section('content')
    <div class="card col-xl-4 col-8 p-4" style="border-radius: 10px;">
        <h2>Iniciar Sesión</h2>

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="pt-2">
                <input type="text" id="email" name="email" placeholder="Email" required class="form-control" />
            </div>
            <div class="pt-2">
                <input type="password" id="password" name="password" placeholder="Contraseña" required
                    class="form-control" />
            </div>
            <div class="error pt-2" id="errorMsg">Usuario o contraseña incorrectos.</div>
            <div class="pt-4">
                <button class="btn btn-lg" onclick="validateLogin()" type="submit">Ingresar</button>
            </div>
            @if ($errors->any())
                <div class="mt-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Error!</strong>
                        <span class="block sm:inline">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif
        </form>
        <div class="register-link">
            ¿Aún no tienes una cuenta? <a href="{{ route('register') }}">Registrate</a>
        </div>
    </div>



    <div style="position: absolute; top: 1rem; right: 1rem">
        <a href="{{ url('/') }}" style="text-decoration: none; color: white;">
            < Ir a la pagina principal </a>
    </div>
@endsection
