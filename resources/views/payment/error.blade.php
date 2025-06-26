@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white dark:bg-brown-700 rounded-lg shadow-xl p-8 max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-red-500 mb-4">Error en el Pago</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-6">
            Ocurrió un error al procesar tu pago: {{ session('error') }}
        </p>
        <div class="flex justify-center">
            <a href="{{ route('metodos.pago') }}" 
               class="bg-brown-500 text-white px-6 py-3 rounded hover:bg-brown-600 transition-colors">
                Volver a intentar
            </a>
        </div>
    </div>
</div>
@endsection