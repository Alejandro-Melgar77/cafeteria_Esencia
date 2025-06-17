<div class="flex flex-col justify-between h-[calc(100vh-8rem)]">
    @auth
        <?php
        $rol = Auth::user()->usuario->rol->Cargo;
        $listaNavegacion = [
            'administrador' => [
                'administracion' => [
                    'Inicio' => 'dashboard',
                    'Gestionar roles' => 'roles.index',
                    'Gestionar privilegios' => 'privilegios.index',
                    'Gestionar clientes' => 'clientes.index',
                    'Gestionar personal' => 'personal.index',
                    'Gestionar bitacoras' => 'bitacoras.index',
                ],
                'inventario' => [
                    'Gestionar inventario' => 'inventarios.index',
                    'Gestionar recetas' => 'recetas.index',
                    'Gestionar proveedores' => 'proveedores.index',
                ],
                'compras' => [
                    'Nota de Compra' => 'nota_compra.create',
                    'Nota de Salida' => 'nota_salida.create',
                ],
            ],
            'personal' => [
                'administracion' => [
                    'Inicio' => 'dashboard',
                    'Gestionar privilegios' => 'privilegios.index',
                    'Gestionar clientes' => 'clientes.index',
                    'Gestionar personal' => 'personal.index',
                ],
                'inventario' => [
                    'Gestionar inventario' => 'inventarios.index',
                    'Gestionar proveedores' => 'proveedores.index',
                ],
                'compras' => [
                    'Nota de Compra' => 'nota_compra.create',
                    'Nota de Salida' => 'nota_salida.create',
                ],
            ],
            'cliente' => [
                'administracion' => [
                    'Inicio' => 'dashboard',
                    'Gestionar clientes' => 'clientes.index',
                ],
                'inventario' => [],
                'compras' => [],
            ],
        ];
        ?>

        <div class="flex flex-col">
            <div class="flex border-b border-brown-200 items-center">
                <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">Contenido</p>
            </div>

            @foreach (['administracion' => 'Administración', 'inventario' => 'Módulo de inventario', 'compras' => 'Módulo de compras'] as $grupo => $titulo)
                @if (!empty($listaNavegacion[$rol][$grupo]))
                    <nav x-data="{ open: false }" class="flex flex-col gap-1 text-md font-medium py-2 px-4 relative">
                        <button @click="open = !open"
                            class="flex justify-between text-sm items-center w-full px-4 py-2 bg-brown-100 hover:bg-brown-200 rounded-xl text-brown-600 dark:text-brown-200"
                            type="button" :class="{ 'bg-brown-200': open }">
                            {{ $titulo }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200"
                                :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="flex flex-col mt-2 w-full gap-1 z-10 bg-white p-2 dark:bg-brown-800 rounded-xl shadow"
                            x-cloak>
                            @foreach ($listaNavegacion[$rol][$grupo] as $nombre => $ruta)
                                <li>
                                    <a href="{{ route($ruta) }}"
                                        class="flex w-full text-sm gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 
                                hover:bg-brown-200 py-1.5 px-4 rounded-xl
                                    @if (Route::is($ruta)) bg-brown-200 dark:bg-brown-400 @endif">
                                        {{ $nombre }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
            @endforeach
        </div>
    @endauth



    <div class="flex flex-col">
        <div class="flex border-b border-brown-200 items-center">
            <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">
                Panel de usuario
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
                            class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">
                            Perfil de usuario
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="decoration-none flex cursor-pointer w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl"
                                type="submit">
                                <x-heroicon-o-arrow-right-on-rectangle class="h-6 w-6" />
                                <span class="hide-menu">Cerrar sesión</span>
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">
                            Iniciar sesión
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">
                            Registrarse
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>

</div>
