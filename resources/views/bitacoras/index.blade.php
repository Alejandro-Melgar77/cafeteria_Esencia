@extends('layouts.general')

@section('content')
    <div class="flex flex-col bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="title text-xl font-semibold flex items-center">
            <h1>Bitácoras</h1>
        </div>

        <div class="content flex flex-col">
            <div class="flex py-4">
                <span class="text-pretty text-xs font-light">
                    Aquí podrás ver las bitácoras del sistema, las cuales contienen información sobre las acciones
                    realizadas por los usuarios.
                </span>
            </div>

            <div class="flex py-4">
                <a href="{{ route('bitacoras.descargar') }}" target="_blank"
                    class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                    Descargar Bitácora General
                </a>
            </div>
            <div class="flex flex-col py-4">
                <span class="text-pretty text-xs font-light pb-2">
                    Puedes descargar las bitácoras de un rango de fechas específico. Ingresa las fechas en el formato
                    correcto.
                </span>
                <div class="flex gap-4 flex-col sm:flex-row">
                    <form action="{{ route('bitacoras.descargar.rango') }}" method="POST" target="_blank"
                        class="flex gap-2 flex-col sm:flex-row">
                        @csrf
                        <div class="flex flex-col">
                            <label for="inicio">Fecha inicio</label>
                            <input type="date" name="inicio" required
                                class="px-3 py-2 rounded-lg outline outline-brown-500 focus:outline-orange-700 sm:text-sm/6">
                        </div>
                        <div class="flex flex-col">
                            <label for="final">Fecha final</label>
                            <input type="date" name="final" required
                                class="px-3 py-2 rounded-lg outline outline-brown-500 focus:outline-orange-700 sm:text-sm/6">
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="px-4 py-2 bg-brown-600 text-white rounded-lg hover:bg-brown-700 cursor-pointer">
                                Descargar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection