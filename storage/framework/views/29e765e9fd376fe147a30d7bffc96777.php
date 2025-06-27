<?php if(auth()->guard()->check()): ?>
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
            <?php $__currentLoopData = $listaNavegacion[$rol]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item['tipo'] === 'item'): ?>
                    <!-- Elemento individual -->
                    <li>
                        <a href="<?php echo e(route($item['ruta'])); ?>"
                            class="flex w-full gap-2 text-sm text-brown-600 dark:text-brown-200 hover:text-orange-400 
                            hover:bg-brown-200 py-2 px-4 rounded-xl <?php if(Route::is($item['ruta'])): ?> bg-brown-200 dark:bg-brown-400 <?php endif; ?>">
                            <?php echo e($item['titulo']); ?>

                        </a>
                    </li>
                <?php elseif($item['tipo'] === 'grupo'): ?>
                    <!-- Grupo desplegable -->
                    <li>
                        <details class="group">
                            <summary
                                class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 
                                hover:bg-brown-200 py-2 px-4 rounded-xl cursor-pointer list-none text-sm justify-between items-center">
                                <span><?php echo e($item['titulo']); ?></span>
                                <svg class="w-4 h-4 mt-1 transform group-open:rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <ul class="ml-2 mt-1 p-2 bg-white shadow-sm rounded-lg dark:bg-gray-800">
                                <?php $__currentLoopData = $item['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nombre => $ruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="py-1">
                                        <a href="<?php echo e(route($ruta)); ?>"
                                            class="flex w-full gap-2 text-sm text-brown-600 dark:text-brown-200 hover:text-orange-400 
                                            hover:bg-brown-200 py-1.5 px-4 rounded-xl <?php if(Route::is($ruta)): ?> bg-brown-200 dark:bg-brown-400 <?php endif; ?>">
                                            <?php echo e($nombre); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </details>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>
<?php endif; ?>

<div class="flex border-b border-brown-200 items-center">
    <p class="title-sidebar font-medium text-xs text-brown-500 px-8 py-2">Panel de usuario
        <?php if(auth()->guard()->check()): ?>
            <?php echo e('(Rol:' . $rol . ')'); ?>

        <?php endif; ?>
    </p>
</div>
<nav class="flex flex-col gap-1 text-md font-medium py-4 px-4">
    <ul class="flex flex-col w-full gap-1">
        <?php if(auth()->guard()->check()): ?>
            <li>
                <a href="<?php echo e(route('usuarios.index')); ?>"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Perfil
                    de usuario</a>
            </li>
            <li>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button
                        class="decoration-none flex cursor-pointer w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl"
                        href="<?php echo e(route('logout')); ?>" aria-expanded="false">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-arrow-right-on-rectangle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        <span class="hide-menu">Cerrar sesión</span>
                    </button>
                </form>
            </li>
        <?php else: ?>
            <li>
                <a href="<?php echo e(route('login')); ?>"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Iniciar
                    sesión</a>
            </li>
            <li>
                <a href="<?php echo e(route('register')); ?>"
                    class="flex w-full gap-2 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 py-2 px-4 rounded-2xl">Registrarse</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<?php /**PATH C:\Users\aleme\Desktop\actualizacion de contraseña cafeteriaEsencia\La-Escencia-master act contra\resources\views/partials/nav.blade.php ENDPATH**/ ?>