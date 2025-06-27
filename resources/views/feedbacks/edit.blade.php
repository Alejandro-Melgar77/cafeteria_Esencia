@extends('layouts.general')

@section('content')
    <div class="flex flex-col items-center bg-white dark:bg-brown-700 rounded-xl shadow p-8">
        <div class="w-full max-w-2xl">
            <div class="title flex justify-between items-center">
                <h4 class="font-semibold text-xl">Editar Feedback para Compra #{{ $feedback->notaDeVenta->id }}</h4>
            </div>
            <div class="py-4">
                <span class="text-pretty text-sm font-light">
                    Actualiza tu calificación y comentario para la compra realizada el {{ \Carbon\Carbon::parse($feedback->notaDeVenta->fecha)->format('d/m/Y') }}.
                </span>
            </div>

            <form method="POST" action="{{ route('feedbacks.update', $feedback->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label for="calificacion" class="block text-sm font-medium text-gray-700 mb-2">Calificación</label>
                    <div class="flex items-center space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star{{ $i }}" name="calificacion" value="{{ $i }}" class="hidden" {{ $feedback->calificacion == $i ? 'checked' : '' }}>
                            <label for="star{{ $i }}" class="cursor-pointer {{ $feedback->calificacion >= $i ? 'text-yellow-400' : 'text-gray-300' }} hover:text-yellow-500">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </label>
                        @endfor
                    </div>
                    @error('calificacion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">Comentario</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Describe tu experiencia con esta compra...">{{ old('descripcion', $feedback->descripcion) }}</textarea>
                    @error('descripcion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('feedbacks.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Cancelar</a>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-blue-600 transition">Actualizar Feedback</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('input[type="radio"][name="calificacion"]');
            const labels = document.querySelectorAll('label[for^="star"]');
            
            stars.forEach((star, index) => {
                star.addEventListener('change', function() {
                    // Reset all stars
                    labels.forEach(label => {
                        label.classList.remove('text-yellow-400');
                        label.classList.add('text-gray-300');
                    });
                    
                    // Color stars up to selected
                    for (let i = 0; i <= index; i++) {
                        labels[i].classList.remove('text-gray-300');
                        labels[i].classList.add('text-yellow-400');
                    }
                });
            });
        });
    </script>
@endsection