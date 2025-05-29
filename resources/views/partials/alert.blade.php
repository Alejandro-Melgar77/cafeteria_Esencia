<?php
$alerts = [
    'info' => 'bg-cyan-100 text-cyan-800',
    'success' => 'bg-green-100 text-green-800',
    'warning' => 'bg-yellow-100 text-yellow-800',
    'danger' => 'bg-red-100 text-red-800',
    'dark' => 'bg-gray-800 text-white',
    'light' => 'bg-gray-100 text-gray-800',
];
?>

@foreach ($alerts as $type => $class)
    @if (Session::has($type))
        <div class="flex w-full mb-2 alert-box">
            <div class="{{ $class }} py-3 px-5 rounded-xl shadow flex justify-between w-full">
                <span class="text-xs font-medium self-center">{!! Session::get($type) !!}</span>
                <button class="self-start cursor-pointer p-1" type="button"
                    onclick="this.closest('.alert-box').classList.add('hidden')">
                    <x-heroicon-o-x-mark class="w-4 h-4 text-gray-600" />
                </button>
            </div>
        </div>
        {{ Session::forget($type) }}
    @endif
@endforeach
