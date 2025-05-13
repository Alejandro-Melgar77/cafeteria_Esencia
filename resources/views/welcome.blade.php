@extends('layouts.app')

@section('style')
    <style>
        .dropdown a {
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        .dropdown a:hover {
            background-color: #f0f0f0;
        }

        .catalogo,
        .reservas {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        footer {
            background-color: #2e2e2e;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .card {
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="p-4">
        <header class="pb-2">
            <h1>Cafeteria La Esencia</h1>
        </header>

        {{-- <div class="dropdown" id="userMenu">
            <a href="#">Cuenta</a>
            <a href="#">Compras</a>
            <a href="#">Reservas</a>
            <a href="#">Cerrar Sesión</a>
        </div> --}}

        <section>
            <div class="card p-4 border">
                <h2>Catálogo de Cafés</h2>
                <div class="d-flex justify-content-between flex-wrap ">
                    <div class="card border" style="width: 18rem;">
                        <img src="{{ asset('images/espresso.webp') }}" class="rounded" height="200" style="object-fit: cover"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Espresso</h5>
                            <h3 class="card-text font-bold">Bs. 15</h3>
                            <a href="#" class="btn btn-primary">Pedir ></a>
                        </div>
                    </div>
                    <div class="card border" style="width: 18rem;">
                        <img src="{{ asset('images/latte.jpg') }}" class="rounded" height="200" style="object-fit: cover"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Latte</h5>
                            <h3 class="card-text font-bold">Bs. 18</h3>
                            <a href="#" class="btn btn-primary">Pedir ></a>
                        </div>
                    </div>
                    <div class="card border" style="width: 18rem;">
                        <img src="{{ asset('images/americano.jpeg') }}" class="rounded" height="200"
                            style="object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Americano</h5>
                            <h3 class="card-text font-bold">Bs. 12</h3>
                            <a href="#" class="btn btn-primary">Pedir ></a>
                        </div>
                    </div>
                    <div class="card border" style="width: 18rem;">
                        <img src="{{ asset('images/capuchino.jpg') }}" class="rounded" height="200"
                            style="object-fit: cover" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Capuccino</h5>
                            <h3 class="card-text font-bold">Bs. 20</h3>
                            <a href="#" class="btn btn-primary">Pedir ></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="card p-4 border" style="border-radius: 10px">
                <h2>Reservas Disponibles</h2>
                <div class="d-flex justify-content-between flex-wrap">
                    <a href="#">
                        <div class="d-flex card rounded shadow-sm border py-2 px-4" style="width: 16rem;">
                            <p style="color: #222">10:00 - 11:00 AM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex card rounded shadow-sm border py-2 px-4" style="width: 16rem;">
                            <p style="color: #222">11:00 - 12:00 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex card rounded shadow-sm border py-2 px-4" style="width: 16rem;">
                            <p style="color: #222">03:00 - 04:00 PM</p>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex card rounded shadow-sm border py-2 px-4" style="width: 16rem;">
                            <p style="color: #222">05:00 - 06:00 PM</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
