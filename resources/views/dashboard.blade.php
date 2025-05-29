@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white rounded-2xl shadow p-8">
        <h1 class="text-4xl font-bold text-brown-800 dark:text-brown-200 mb-4">Bienvenido a La Esencia</h1>
        <div class="flex justify-center items-center flex-col py-28">
            <p class="text-lg text-brown-600 dark:text-brown-300 mb-8">Tu cafetería favorita en la ciudad.</p>
            <a href="{{ route('inventarios.index') }}"
                class="text-xl bg-brown-500 text-white px-4 py-2 rounded-lg hover:bg-brown-400 transition duration-300 cursor-pointer">
                Explorar productos e ingredientes
            </a>
        </div>
    </div>
@endsection
