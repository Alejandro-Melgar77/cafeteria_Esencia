<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <title>¡Gracias por tu compra!</title>
</head>

<body class="bg-coffee dark:bg-brown-900 relative">
    <div class="float-button fixed right-4 bottom-4 z-50">
        <button onclick="toggleTheme()"
            class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-sun'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'icon-sun','class' => 'h-6 w-6 text-brown-100 group-hover:text-black']); ?>
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
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-moon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'icon-moon','class' => 'h-6 w-6 text-brown-100 group-hover:text-black hidden']); ?>
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
        </button>
    </div>

    <div class="flex flex-col dark:text-coffee min-h-screen transition-colors duration-300">
        <img src="<?php echo e(asset('images/coffee2.webp')); ?>" alt="Fondo semillas"
            class="absolute right-0 top-10 object-cover size-[800px] mask-l-from-30% z-0 pointer-events-none opacity-50" />
        
        <!-- Sidebar animado para móviles-->
        <div id="mobileSidebarBackdrop" class="fixed inset-0 z-30 bg-black/30 hidden" onclick="closeSidebar()">
            <div id="mobileSidebarPanel"
                class="bg-brown-100 dark:bg-brown-900 w-64 h-full py-6 shadow-lg transform -translate-x-full transition-transform duration-300"
                onclick="event.stopPropagation()">
                <div class="flex flex-col px-6">
                    <button onclick="closeSidebar()" class="text-brown-500 hover:text-orange-500 mb-4 cursor-pointer">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-x-mark'); ?>
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
                    </button>
                    <div class="items-center flex pb-6">
                        <a href="<?php echo e(url('/')); ?>" class="flex items-center">
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-14 w-auto" />
                            <div class="flex flex-col ml-3">
                                <span class="text-lg font-medium text-brown-700 dark:text-brown-200">Cafeteria</span>
                                <span class="text-xl font-semibold text-brown-700 dark:text-brown-200">La Esencia</span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php echo $__env->make('partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>

        <!-- Header -->
        <header id="mainHeader"
            class="border-b border-brown-200 grid grid-cols-2 md:grid-cols-3 items-center fixed top-0 right-0 left-0 z-20 h-20 transition-colors duration-300">
            <div class="flex items-center md:hidden">
                <button onclick="openSidebar()"
                    class="ml-6 flex justify-center items-center rounded-full size-10 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 cursor-pointer">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-bars-3'); ?>
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
                </button>
            </div>

            <div class="items-center hidden md:flex w-64 h-full dark:bg-brown-800 px-4">
                <a href="<?php echo e(url('/')); ?>" class="flex items-center">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-16 w-auto" />
                    <div class="flex flex-col ml-3">
                        <span class="text-lg font-medium text-brown-700 dark:text-brown-200">Cafeteria</span>
                        <span class="text-2xl font-bold text-brown-700 dark:text-brown-200">La Esencia</span>
                    </div>
                </a>
            </div>

            <nav class="justify-self-center items-center text-sm font-medium hidden md:flex">
                <a href="<?php echo e(url('/')); ?>"
                    class="text-brown-500 dark:text-brown-200 hover:text-orange-400 py-2 px-4">Inicio</a>
                <a href="<?php echo e(route('comprar_productos')); ?>"
                    class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Productos</a>

                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>"
                        class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Panel de control</a>
                <?php else: ?>
                    <a href="#contacto"
                        class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Contacto</a>
                <?php endif; ?>
            </nav>

            <div class="flex justify-end items-center gap-2 px-6">
                <div class="relative block">
                    <button class="absolute left-2 top-1/2 -translate-y-1/2 cursor-pointer" onclick="openSearch()">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-magnifying-glass'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-6 text-brown-800 dark:text-brown-300']); ?>
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
                    </button>
                    <input type="text" placeholder="Buscar..." id="searchInput"
                        class="bg-white placeholder:text-brown-400 dark:bg-brown-600 rounded-full focus:rounded-2xl focus:w-42 transition-all duration-300 shadow pl-8 focus:pl-10 pr-3 py-3 w-0 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-600" />
                </div>

                <?php if(auth()->guard()->guest()): ?>
                    <div class="hidden lg:flex gap-2 items-center">
                        <a href="<?php echo e(route('login')); ?>"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-200 border-2 border-brown-500 bg-brown-500 rounded-4xl py-3 px-3">Iniciar
                            sesión</a>
                        <a href="<?php echo e(route('register')); ?>"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-600 bg-coffee border-2 border-brown-500 rounded-4xl py-3 px-3">Registrarse</a>
                    </div>
                <?php endif; ?>



                <div class="relative inline-block text-left">
                    <div>
                        <button id="dropdownButton" type="button"
                            class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-shopping-cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 text-brown-100 group-hover:text-black']); ?>
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
                        </button>
                    </div>

                    <div id="dropdownMenu"
                        class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="py-1">

                            <p class="block px-4 py-2 text-sm font-bold">productos</p>
                            <div id="cartItems" class="max-h-60 overflow-y-auto">
                                <p class="block px-4 py-2 text-sm text-gray-700">Carrito vacío</p>
                            </div>

                            <button onclick="enviarCarrito()"
                                class="flex justify-center bg-brown-400 py-2 px-4 rounded-xl text-white">Ir
                                pagar</button>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenido principal de agradecimiento -->
        <div class="z-10 relative mt-20 flex-grow flex items-center justify-center px-4">
            <div class="bg-white dark:bg-brown-700 rounded-2xl shadow-xl p-8 max-w-md w-full text-center">
                <div class="text-green-500 mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h1 class="text-3xl font-bold text-brown-800 dark:text-brown-200 mb-4">¡Pago Completado!</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                    Gracias por tu compra. Tu orden ha sido procesada exitosamente.
                    <br>Número de transacción: <span class="font-mono"><?php echo e(session('order_id') ?? 'N/A'); ?></span>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo e(route('comprar_productos')); ?>"
                        class="bg-brown-500 hover:bg-brown-600 text-white px-6 py-3 rounded-lg transition-colors">
                        Volver a la tienda
                    </a>
                    <a href="<?php echo e(url('/')); ?>"
                        class="border border-brown-500 text-brown-700 dark:text-brown-200 hover:bg-brown-100 dark:hover:bg-brown-800 px-6 py-3 rounded-lg transition-colors">
                        Inicio
                    </a>
                </div>
            </div>
        </div>
        <footer class="bg-brown-800 text-gray-100 mt-auto">
            <div class="mx-auto px-4 py-12 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="flex flex-col items-center">
                        <h3 class="text-xl font-bold mb-2">Cafeteria La Esencia</h3>
                        <p class="text-sm text-gray-400">
                            Disfruta de los mejores cafés y un ambiente acogedor.
                        </p>
                    </div>

                    <div class="flex flex-col items-center">
                        <h4 class="text-sm font-semibold text-white uppercase mb-4">
                            Enlaces
                        </h4>
                        <ul class="space-y-2 flex flex-col items-center justify-center">
                            <li>
                                <a href="<?php echo e(url('/')); ?>" class="hover:text-white">Inicio</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-white">Sobre nosotros</a>
                            </li>
                            <li><a href="#" class="hover:text-white">Servicios</a></li>
                            <li><a href="#" class="hover:text-white">Contacto</a></li>
                        </ul>
                    </div>

                    <div class="flex flex-col items-center">
                        <h4 class="text-sm font-semibold text-white uppercase mb-4">
                            Contacto
                        </h4>
                        <ul class="space-y-2 text-sm text-gray-400 flex flex-col items-center justify-center">
                            <li>📍 3er Anillo, Sobre Av. Noel Kempff Mercado</li>
                            <li>📞 +591 62095022</li>
                            <li>✉ LaEsencia@gmail.com</li>
                        </ul>
                    </div>

                    <div class="flex flex-col items-center">
                        <h4 class="text-sm font-semibold text-white uppercase mb-4">
                            Síguenos
                        </h4>
                        <div class="flex flex-col gap-2 items-center justify-center">
                            <a href="#" class="hover:text-white">🌐 Facebook</a>
                            <a href="#" class="hover:text-white">📷 Instagram</a>
                            <a href="#" class="hover:text-white">🐦 Twitter</a>
                        </div>
                    </div>
                </div>

                <div class="mt-12 border-t border-gray-700 pt-6 text-center text-sm text-gray-500">
                    © 2025 La Esencia. Todos los derechos reservados.
                </div>
            </div>
        </footer>
    </div>

    <script>
        const backdrop = document.getElementById("mobileSidebarBackdrop");
        const panel = document.getElementById("mobileSidebarPanel");

        function openSidebar() {
            backdrop.classList.remove("hidden");
            setTimeout(() => {
                panel.classList.remove("-translate-x-full");
            }, 10);
        }

        function closeSidebar() {
            panel.classList.add("-translate-x-full");
            setTimeout(() => {
                backdrop.classList.add("hidden");
            }, 300);
        }

        const header = document.getElementById("mainHeader");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 10) {
                header.classList.add("backdrop-blur-md", "shadow-md");
            } else {
                header.classList.remove("backdrop-blur-md", "shadow-md");
            }
        });

        // Función para alternar el tema
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle("dark");
            localStorage.theme = isDark ? "dark" : "light";

            document.getElementById("icon-sun").classList.toggle("hidden", isDark);
            document.getElementById("icon-moon").classList.toggle("hidden", !isDark);
        }

        // Mostrar ícono correcto al cargar
        document.addEventListener("DOMContentLoaded", () => {
            const isDark = document.documentElement.classList.contains("dark");
            document.getElementById("icon-sun").classList.toggle("hidden", isDark);
            document.getElementById("icon-moon").classList.toggle("hidden", !isDark);
        });
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\cafeteria_Esencia-master\resources\views/gracias.blade.php ENDPATH**/ ?>