@auth
    <?php
    $rol = Auth::user()->usuario->rol->Cargo;
    $listaNavegacion = [
        'administrador' => [
            [
                'titulo' => 'Inicio',
                'ruta' => 'dashboard',
                'tipo' => 'item',
            ],
            [
                'titulo' => 'Autenticación',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar roles' => 'roles.index',
                    'Gestionar privilegios' => 'privilegios.index',
                ],
            ],
            [
                'titulo' => 'Gestionar Usuario',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar clientes' => 'clientes.index',
                    'Gestionar personal' => 'personal.index',
                    //'Gestionar feedbacks' => 'feedbacks.index'
                ],
            ],
            [
                'titulo' => 'Administrar Reporte',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar bitacoras' => 'bitacoras.index',
                    //'Generar reportes' => 'reportes.index'
                ],
            ],
            [
                'titulo' => 'Administrar Inventario',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar inventario' => 'inventarios.index',
                    'Gestionar proveedores' => 'proveedores.index',
                    'Nota de Compra' => 'nota_compra.create',
                    'Nota de Salida' => 'nota_salida.create',
                    'Gestionar mesas' => 'mesas.index',
                    'Gestionar menus' => 'menus.index',
                    'Gestionar recetas' => 'recetas.index',
                ],
            ],
            [
                'titulo' => 'Gestionar Reservas',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar mesas' => 'mesas.index',
                    'Gestionar reservas' => 'reservas.index',
                ],
            ],
            [
                'titulo' => 'Gestionar Ventas',
                'tipo' => 'grupo',
                'items' => [
                    //'Gestionar pagos' => 'pagos.index',
                    //'Gestionar Nota de Venta' => 'nota_venta.index',
                    //'Gestionar comprobantes' => 'comprobantes.index'
                ],
            ],
        ],
        'personal' => [
            [
                'titulo' => 'Inicio',
                'ruta' => 'dashboard',
                'tipo' => 'item',
            ],
            [
                'titulo' => 'Autenticación',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar privilegios' => 'privilegios.index',
                ],
            ],
            [
                'titulo' => 'Gestionar Usuario',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar clientes' => 'clientes.index',
                    'Gestionar personal' => 'personal.index',
                ],
            ],
            [
                'titulo' => 'Administrar Inventario',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar inventario' => 'inventarios.index',
                    'Gestionar proveedores' => 'proveedores.index',
                    'Nota de Compra' => 'nota_compra.create',
                    'Nota de Salida' => 'nota_salida.create',
                ],
            ],
        ],
        'cliente' => [
            [
                'titulo' => 'Inicio',
                'ruta' => 'dashboard',
                'tipo' => 'item',
            ],
            [
                'titulo' => 'Gestionar Usuario',
                'tipo' => 'grupo',
                'items' => [
                    'Gestionar clientes' => 'clientes.index',
                ],
            ],
        ],
    ];
    ?>

    <div class="flex border-b border-brown-200 items-center">
        <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">Contenido</p>
    </div>
    <nav class="flex flex-col gap-1 text-md font-medium py-4 px-4">
        <ul class="flex flex-col w-full gap-1">
            @foreach ($listaNavegacion[$rol] as $item)
                @if ($item['tipo'] === 'item')
                    <!-- Elemento individual -->
                    <li>
                        <a href="{{ route($item['ruta']) }}"
                            class="flex w-full gap-2 text-sm text-brown-600 dark:text-brown-200 hover:text-orange-400 
                            hover:bg-brown-200 py-2 px-4 rounded-xl @if (Route::is($item['ruta'])) bg-brown-200 dark:bg-brown-400 @endif">
                            {{ $item['titulo'] }}
                        </a>
                    </li>
                @elseif($item['tipo'] === 'grupo')
                    <!-- Grupo desplegable -->
                    <li>
                        <details class="group">
                            <summary
                                class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 
                                hover:bg-brown-200 py-2 px-4 rounded-xl cursor-pointer list-none text-sm justify-between items-center">
                                <span>{{ $item['titulo'] }}</span>
                                <svg class="w-4 h-4 mt-1 transform group-open:rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <ul class="ml-2 mt-1 p-2 bg-white shadow-sm rounded-lg dark:bg-gray-800">
                                @foreach ($item['items'] as $nombre => $ruta)
                                    <li class="py-1">
                                        <a href="{{ route($ruta) }}"
                                            class="flex w-full gap-2 text-sm text-brown-600 dark:text-brown-200 hover:text-orange-400 
                                            hover:bg-brown-200 py-1.5 px-4 rounded-xl @if (Route::is($ruta)) bg-brown-200 dark:bg-brown-400 @endif">
                                            {{ $nombre }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                @endif
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
