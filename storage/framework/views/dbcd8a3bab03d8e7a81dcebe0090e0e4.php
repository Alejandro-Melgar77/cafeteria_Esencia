<!DOCTYPE html>
<html lang="es">

<head>
    <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body class="bg-coffee dark:bg-brown-900 relative">
    <div class="float-button fixed right-4 bottom-4 z-30">
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
        <!-- Sidebar animado para móviles -->
        <div id="mobileSidebarBackdrop" class="fixed inset-0 z-30 bg-black/30 hidden overflow-y-scroll" onclick="closeSidebar()">
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
                        <i class="fa-solid fa-xmark fa-sm"></i>
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

        <header id="mainHeader"
            class="border-b border-brown-200 bg-coffee dark:bg-brown-800 grid grid-cols-2 items-center h-20 fixed top-0 right-0 left-0 z-20 transition-colors duration-300">
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

            <div class="items-center hidden md:flex w-64 h-full bg-coffee dark:bg-brown-800 px-4">
                <a href="<?php echo e(url('/')); ?>" class="flex items-center">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-16 w-auto" />
                    <div class="flex flex-col ml-3">
                        <span class="text-lg font-medium text-brown-700 dark:text-brown-200">Cafeteria</span>
                        <span class="text-2xl font-bold text-brown-700 dark:text-brown-200">La Esencia</span>
                    </div>
                </a>
            </div>

            <div class="flex justify-end gap-2 px-6">
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

                <?php if(auth()->guard()->check()): ?>
                    <div class="hidden lg:flex items-center">
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button
                                class="flex decoration-none bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10"
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
                        </form>
                    </div>
                <?php else: ?>
                    <div class="hidden lg:flex gap-2 items-center">
                        <a href="<?php echo e(route('login')); ?>"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-200 border-2 border-brown-500 bg-brown-500 rounded-4xl py-3 px-3">Iniciar
                            sesión</a>
                        <a href="<?php echo e(route('register')); ?>"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-600 bg-coffee border-2 border-brown-500 rounded-4xl py-3 px-3">Registrarse</a>
                    </div>
                <?php endif; ?>

                <button class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
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
                <button class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-user'); ?>
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
        </header>

        <div class="h-screen z-10 relative">
            <!-- sidebar -->
            <div class="hidden md:block fixed top-20 bottom-0 overflow-y-scroll">
                <div class="bg-brown-100 dark:bg-brown-900 w-64 h-full py-6 shadow">
                    <?php echo $__env->make('partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="flex flex-col min-h-screen pt-20 justify-between">
                <!-- Contenido principal -->
                <div class="flex flex-col md:ml-64 p-4">
                    <?php echo $__env->make('partials.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                <footer class="bg-brown-800 text-gray-100 md:ml-64 flex flex-col justify-center items-center">
                    <div class="mx-auto px-4 py-12 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <!-- Logo & Descripción -->
                            <div class="flex flex-col items-center">
                                <h3 class="text-xl font-bold mb-2">Cafeteria La Esencia</h3>
                                <p class="text-sm text-gray-400">
                                    Disfruta de los mejores cafés y un ambiente acogedor.
                                </p>
                            </div>

                            <!-- Enlaces útiles -->
                            <div class="flex flex-col items-center">
                                <h4 class="text-sm font-semibold text-white uppercase mb-4">
                                    Enlaces
                                </h4>
                                <ul class="space-y-2 flex flex-col items-center justify-center">
                                    <li>
                                        <a href="#" class="hover:text-white">Inicio</a>
                                    </li>
                                    <li>
                                        <a href="#" class="hover:text-white">Sobre nosotros</a>
                                    </li>
                                    <li><a href="#" class="hover:text-white">Servicios</a></li>
                                    <li><a href="#" class="hover:text-white">Contacto</a></li>
                                </ul>
                            </div>

                            <!-- Contacto -->
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

                            <!-- Redes sociales -->
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
        </div>
    </div>

    <script>
        const backdrop = document.getElementById("mobileSidebarBackdrop");
        const panel = document.getElementById("mobileSidebarPanel");

        function openSidebar() {
            backdrop.classList.remove("hidden");
            setTimeout(() => {
                panel.classList.remove("-translate-x-full");
            }, 10); // Delay para que la transición funcione
        }

        function closeSidebar() {
            panel.classList.add("-translate-x-full");
            setTimeout(() => {
                backdrop.classList.add("hidden");
            }, 300); // Espera a que termine la animación
        }

        const header = document.getElementById("mainHeader");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 10) {
                header.classList.add("backdrop-blur-md", "shadow-md");
            } else {
                header.classList.remove("backdrop-blur-md", "shadow-md");
            }
        });

        // Aplica el tema al cargar la página según localStorage
        if (
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }

        // Función para alternar el tema
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle("dark");
            localStorage.theme = isDark ? "dark" : "light";

            // Alternar visibilidad de íconos
            document.getElementById("icon-sun").classList.toggle("hidden", isDark);
            document
                .getElementById("icon-moon")
                .classList.toggle("hidden", !isDark);
        }

        // Mostrar ícono correcto al cargar
        document.addEventListener("DOMContentLoaded", () => {
            const isDark = document.documentElement.classList.contains("dark");
            document.getElementById("icon-sun").classList.toggle("hidden", isDark);
            document
                .getElementById("icon-moon")
                .classList.toggle("hidden", !isDark);
        });

        function openSearch() {
            const searchInput = document.getElementById("searchInput");
            searchInput.focus();
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\aleme\Desktop\actualizacion de contraseña cafeteriaEsencia\La-Escencia-master act contra\resources\views/layouts/general.blade.php ENDPATH**/ ?>