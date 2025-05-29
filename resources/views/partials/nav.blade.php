@auth
    <?php
    $rol = Auth::user()->usuario->rol->Cargo;
    $listaNavegacion = [
        'administrador' => [
            'Inicio' => 'dashboard',
            'Gestionar roles' => 'roles.index',
            'Gestionar privilegios' => 'privilegios.index',
            'Gestionar clientes' => 'clientes.index',
            'Gestionar personal' => 'personal.index',
            'Gestionar inventario' => 'inventarios.index',
            'Gestionar bitacoras' => 'bitacoras.index',
            'Gestionar proveedores' => 'proveedores.index',
        ],
        'personal' => [
            'Inicio' => 'dashboard',
            'Gestionar privilegios' => 'privilegios.index',
            'Gestionar clientes' => 'clientes.index',
            'Gestionar personal' => 'personal.index',
            'Gestionar inventario' => 'inventarios.index',
            'Gestionar proveedores' => 'proveedores.index',
        ],
        'cliente' => [
            'Inicio' => 'dashboard',
            'Gestionar clientes' => 'clientes.index',
        ],
    ];
    ?>
    <div class="flex border-b border-brown-200 items-center">
        <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">Contenido</p>
    </div>
    <nav class="flex flex-col gap-1 text-md font-medium py-4 px-4">
        <ul
            class="flex flex-col w-full gap-1 [&>li>a]:flex [&>li>a]:text-brown-600 dark:[&>li>a]:text-brown-200 [&>li>a]:hover:text-orange-400 [&>li>a]:hover:bg-brown-200 [&>li>a]:py-2 [&>li>a]:px-4 [&>li>a]:rounded-2xl">
            @foreach ($listaNavegacion[$rol] as $nombre => $ruta)
                <li>
                    <a href="{{ route($ruta) }}"
                        class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 
                        hover:bg-brown-200 py-2 px-4 rounded-2xl @if (Route::is($ruta)) bg-brown-200 dark:bg-brown-400 @endif">
                        {{ $nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endauth

<div class="flex border-b border-brown-200 items-center">
    <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">Panel de usuario
        @auth
            {{ '(Rol:' . $rol . ')' }}
        @endauth
    </p>
</div>
<nav class="flex flex-col gap-1 text-md font-medium py-4 px-4">
    <ul class="flex flex-col w-full gap-1">
        @auth
            <li>
                <a href="{{ route('usuarios.index') }}"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Perfil
                    de usuario</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="decoration-none flex cursor-pointer w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl"
                        href="{{ route('logout') }}" aria-expanded="false">
                        <x-heroicon-o-arrow-right-on-rectangle class="h-6 w-6" />
                        <span class="hide-menu">Cerrar sesión</span>
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Iniciar
                    sesión</a>
            </li>
            <li>
                <a href="{{ route('register') }}"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Registrarse</a>
            </li>
        @endauth
    </ul>
</nav>
