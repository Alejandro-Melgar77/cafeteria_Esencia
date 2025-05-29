@if ($errors->any())
    <div class="mb-4">
        <div class="bg-red-100
                        border border-red-400 text-red-700 px-4 py-3 rounded-lg relative"
            role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">Por favor corrige los errores en el formulario.</span>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-600">{{ $error }}</li>
                @endforeach
        </div>
    </div>
@endif
