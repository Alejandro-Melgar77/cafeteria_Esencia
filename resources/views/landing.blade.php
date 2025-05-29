<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="bg-coffee dark:bg-brown-900 relative">
    <div class="float-button fixed right-4 bottom-4 z-50">
        <button onclick="toggleTheme()"
            class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
            <x-heroicon-o-sun id="icon-sun" class="h-6 w-6 text-brown-100 group-hover:text-black" />
            <x-heroicon-o-moon id="icon-moon" class="h-6 w-6 text-brown-100 group-hover:text-black hidden" />
        </button>
    </div>

    <div class="flex flex-col dark:text-coffee min-h-screen transition-colors duration-300">
        <img src="{{ asset('images/coffee2.webp') }}" alt="Fondo semillas"
            class="absolute right-0 top-10 object-cover size-[800px] mask-l-from-30% z-0 pointer-events-none opacity-50" />
        <!-- Sidebar animado para móviles -->
        <div id="mobileSidebarBackdrop" class="fixed inset-0 z-30 bg-black/30 hidden" onclick="closeSidebar()">
            <div id="mobileSidebarPanel"
                class="bg-brown-100 dark:bg-brown-900 w-64 h-full py-6 shadow-lg transform -translate-x-full transition-transform duration-300"
                onclick="event.stopPropagation()">
                <div class="flex flex-col px-6">
                    <button onclick="closeSidebar()" class="text-brown-500 hover:text-orange-500 mb-4 cursor-pointer">
                        <x-heroicon-o-x-mark class="h-6 w-6" />
                        <i class="fa-solid fa-xmark fa-sm"></i>
                    </button>
                    <div class="items-center flex pb-6">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-14 w-auto" />
                            <div class="flex flex-col ml-3">
                                <span class="text-lg font-medium text-brown-700 dark:text-brown-200">Cafeteria</span>
                                <span class="text-xl font-semibold text-brown-700 dark:text-brown-200">La Esencia</span>
                            </div>
                        </a>
                    </div>
                </div>
                @include('partials.nav')
            </div>
        </div>

        <header id="mainHeader"
            class="border-b border-brown-200 grid grid-cols-2 md:grid-cols-3 items-center fixed top-0 right-0 left-0 z-20 h-20 transition-colors duration-300">
            <div class="flex items-center md:hidden">
                <button onclick="openSidebar()"
                    class="ml-6 flex justify-center items-center rounded-full size-10 text-brown-600 dark:text-brown-200 hover:text-orange-400 hover:bg-brown-200 cursor-pointer">
                    <x-heroicon-o-bars-3 class="h-6 w-6" />
                </button>
            </div>

            <div class="items-center hidden md:flex w-64 h-full dark:bg-brown-800 px-4">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto" />
                    <div class="flex flex-col ml-3">
                        <span class="text-lg font-medium text-brown-700 dark:text-brown-200">Cafeteria</span>
                        <span class="text-2xl font-bold text-brown-700 dark:text-brown-200">La Esencia</span>
                    </div>
                </a>
            </div>

            <nav class="justify-self-center items-center text-sm font-medium hidden md:flex">
                <a href="{{ url('/') }}"
                    class="text-brown-500 dark:text-brown-200 hover:text-orange-400 py-2 px-4">Inicio</a>
                <a href="#"
                    class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Productos</a>

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Panel de control</a>
                @else
                    <a href="#contacto"
                        class="text-brown-500 dark:text-brown-200 hover:text-orange-400 p-2 px-4">Contacto</a>

                @endauth
            </nav>

            <div class="flex justify-end items-center gap-2 px-6">
                <div class="relative block">
                    <button class="absolute left-2 top-1/2 -translate-y-1/2 cursor-pointer" onclick="openSearch()">
                        <x-heroicon-o-magnifying-glass class="size-6 text-brown-800 dark:text-brown-300" />
                    </button>
                    <input type="text" placeholder="Buscar..." id="searchInput"
                        class="bg-white placeholder:text-brown-400 dark:bg-brown-600 rounded-full focus:rounded-2xl focus:w-42 transition-all duration-300 shadow pl-8 focus:pl-10 pr-3 py-3 w-0 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-600" />
                </div>

                @guest
                    <div class="hidden lg:flex gap-2 items-center">
                        <a href="{{ route('login') }}"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-200 border-2 border-brown-500 bg-brown-500 rounded-4xl py-3 px-3">Iniciar
                            sesión</a>
                        <a href="{{ route('register') }}"
                            class="text-xs font-semibold hover:text-orange-300 text-brown-600 bg-coffee border-2 border-brown-500 rounded-4xl py-3 px-3">Registrarse</a>
                    </div>
                @endguest

                <button class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
                    <x-heroicon-o-shopping-cart class="h-6 w-6 text-brown-100 group-hover:text-black" />
                </button>
            </div>
        </header>

        <div class="h-screen z-10 relative mt-20">
            <section id="hero" class="flex flex-col gap-20 px-8 snap-center pt-12 lg:px-24">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col h-full gap-10 justify-center p-4">
                        <h1 class="text-4xl font-bold text-brown-900 dark:text-brown-200">
                            Disfruta de tu <span class="text-orange-400">café</span> antes
                            de tu actividad.
                        </h1>
                        <p class="text-lg text-brown-600 dark:text-brown-400 font-medium">
                            Disfruta de los mejores productos y un ambiente acogedor.
                        </p>
                        <div class="flex items-center gap-4">
                            <a href="#"
                                class="w-48 justify-center flex bg-yellow-950 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-full shadow-lg">Pedir
                                ahora
                                <x-heroicon-o-arrow-right class="h-5 w-5 ml-2" />
                            </a>
                            <a href="#" class="text-orange-400 hover:text-yellow-950">Ver menú</a>
                        </div>
                    </div>
                    <div class="flex h-full w-full justify-center items-center">
                        <div class="relative p-6">
                            <img src="{{ asset('images/hero1.webp') }}" alt="Hero Image"
                                class="size-64 md:size-72 rounded-full justify-center object-cover" />
                            <!-- informacion flotante -->
                            <div
                                class="absolute top-8 left-2 bg-white/70 backdrop-blur shadow-lg rounded-4xl w-42 h-12">
                                <h2
                                    class="bg-white text-brown-600 my-1 mx-1 absolute inset-0 rounded-4xl w-40 h-10 flex items-center justify-center font-bold">
                                    Cappuccino
                                </h2>
                            </div>
                            <div
                                class="absolute top-24 right-0 bg-white/70 backdrop-blur shadow-lg rounded-4xl w-22 h-12">
                                <h2
                                    class="bg-white text-brown-600 my-1 mx-1 absolute inset-0 rounded-4xl w-20 h-10 flex items-center justify-center font-bold">
                                    4.8
                                    <x-heroicon-s-star class="text-yellow-400 size-4 ml-1" />
                                    <i class="fa-solid fa-star text-yellow-400 fa-sm ml-1"></i>
                                </h2>
                            </div>
                            <div
                                class="absolute bottom-4 left-14 bg-white/70 backdrop-blur shadow-lg rounded-4xl w-22 h-12">
                                <h2
                                    class="bg-white text-brown-600 my-1 mx-1 absolute inset-0 rounded-4xl w-20 h-10 flex items-center justify-center font-bold">
                                    18K
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-10 justify-center p-4 pb-24 relative">
                    <h1 class="text-2xl font-bold">
                        Populares en este
                        <span class="underline decoration-orange-400">momento</span>
                    </h1>
                    <!-- sombra de cartas -->
                    <div
                        class="absolute h-50 w-full bg-amber-200/60 -z-10 rounded-4xl shadow-lg bottom-10 left-0 right-0">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                        <div
                            class="flex flex-col bg-white shadow-lg rounded-2xl p-4 hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('images/vanillalatte.jpg') }}" alt="Hero Image"
                                class="flex items-center justify-center w-full h-52 object-cover rounded-xl" />
                            <div class="flex items-center justify-between p-4">
                                <h2 class="text-lg font-bold text-brown-800">
                                    Vanilla Latte
                                </h2>
                                <p class="text-lg font-bold text-brown-800">21 K</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <div>
                                    <a href=""><span
                                            class="border-2 border-orange-500 font-semibold text-sm text-orange-500 rounded-lg px-2 py-1">
                                            Hot</span></a>
                                    <a href="#"><span
                                            class="border-2 border-orange-200 font-semibold text-sm text-orange-200 rounded-lg px-2 py-1">
                                            Cold</span></a>
                                </div>
                                <button class="rounded-full bg-orange-400 text-white py-2 px-3">
                                    >
                                </button>
                            </div>
                        </div>
                        <div
                            class="flex flex-col bg-white shadow-lg rounded-2xl p-4 hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('images/espresso.webp') }}" alt="Hero Image"
                                class="w-full h-52 object-cover justify-center rounded-xl" />
                            <div class="flex items-center justify-between p-4">
                                <h2 class="text-lg font-bold text-brown-800">Espresso</h2>
                                <p class="text-lg font-bold text-brown-800">12 K</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <div>
                                    <a href=""><span
                                            class="border-2 border-orange-200 font-semibold text-sm text-orange-200 rounded-lg px-2 py-1">
                                            Hot</span></a>
                                    <a href="#"><span
                                            class="border-2 border-orange-200 font-semibold text-sm text-orange-200 rounded-lg px-2 py-1">
                                            Cold</span></a>
                                </div>
                                <button class="rounded-full bg-orange-400 text-white py-2 px-3">
                                    >
                                </button>
                            </div>
                        </div>
                        <div
                            class="flex flex-col bg-white shadow-lg rounded-2xl p-4 hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('images/Hazelnut-Latte.jpg') }}" alt="Hero Image"
                                class="w-full h-52 object-cover justify-center rounded-xl" />
                            <div class="flex items-center justify-between p-4">
                                <h2 class="text-lg font-bold text-brown-800">
                                    Hazelnut Latte
                                </h2>
                                <p class="text-lg font-bold text-brown-800">23 K</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <div>
                                    <a href=""><span
                                            class="border-2 border-orange-200 font-semibold text-sm text-orange-200 rounded-lg px-2 py-1">
                                            Hot</span></a>
                                    <a href="#"><span
                                            class="border-2 border-orange-200 font-semibold text-sm text-orange-200 rounded-lg px-2 py-1">
                                            Cold</span></a>
                                </div>
                                <button class="rounded-full bg-orange-400 text-white py-2 px-3">
                                    >
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="hero2"
                class="flex flex-col gap-4 px-8 snap-center lg:px-24 bg-white dark:bg-brown-900 py-16">
                <div class="title-section p-4">
                    <h1 class="text-2xl font-bold">
                        Como se usa el
                        <span class="underline decoration-orange-400"> servicio</span>
                    </h1>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4 justify-around pb-16">
                    <div class="flex flex-col items-center gap-2">
                        <div class="flex justify-center p-2">
                            <img src="{{ asset('images/pasos.png') }}" alt="cafe1" class="size-48" />
                        </div>
                        <h2 class="text-lg font-bold text-brown-800 mt-2">
                            Elige tu café
                        </h2>
                        <p class="text-sm text-brown-600">Hay más de 20 variaciones</p>
                    </div>

                    <div class="flex flex-col items-center gap-2">
                        <div class="flex justify-center p-2">
                            <img src="{{ asset('images/pasos.png') }}" alt="cafe1" class="size-48" />
                        </div>
                        <h2 class="text-lg font-bold text-brown-800 mt-2">
                            Te lo llevamos hasta tí
                        </h2>
                        <p class="text-sm text-brown-600">
                            Elige el servicio de delivery
                        </p>
                    </div>

                    <div class="flex flex-col items-center gap-2">
                        <div class="flex justify-center p-2">
                            <img src="{{ asset('images/pasos.png') }}" alt="cafe1" class="size-48" />
                        </div>
                        <h2 class="text-lg font-bold text-brown-800 mt-2">
                            Distruta tu café
                        </h2>
                        <p class="text-sm text-brown-600">
                            Disfruta de tu café en tu hogar
                        </p>
                    </div>
                </div>
            </section>

            <section id="hero3"
                class="flex flex-col gap-4 px-8 snap-center pt-12 lg:px-24 relative dark:bg-brown-900 py-16 bg-white">
                <div class="absolute bg-coffee w-full h-[400px] -z-0 bottom-5 left-0 right-0"></div>
                <div class="h-[400px] flex w-full items-center z-10">
                    <div class="flex w-full justify-center p-4">
                        <img src="{{ asset('images/fondo-hero2.png') }}" alt="fondo hero 2"
                            class="rounded-lg border-2 border-white shadow-lg object-cover" />
                    </div>
                    <div class="flex flex-col px-0 lg:px-6 gap-8 justify-end w-full h-full">
                        <h1 class="text-lg md:text-4xl font-bold text-brown-900">
                            Acerca de
                            <span class="underline decoration-orange-400">nosotros</span>
                        </h1>
                        <h2 class="text-sm md:text-xl font-bold text-brown-900">
                            Nos encargamos de la calidad de nuestros cafés
                        </h2>
                        <p class="text-[8px] md:text-sm text-brown-500 font-medium">
                            Somos una cafetería dedicada a ofrecer la mejor experiencia
                            cafetera. Con más de 20 años de experiencia, nos enorgullece
                            servir café de alta calidad y brindar un ambiente acogedor.
                        </p>
                        <div class="flex">
                            <a href="#"
                                class="bg-brown-800 py-2 px-6 text-orange-200 rounded-2xl text-sm font-semibold shadow-lg hover:bg-brown-700 transition duration-300">Obtener
                                tu café</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="hero3"
                class="flex flex-col gap-4 snap-center pt-20 px-8 lg:px-24 relative dark:bg-brown-900 py-16 bg-white">
                <div class="h-[400px] flex w-full items-center z-10">
                    <div class="flex flex-col px-4 lg:px-6 gap-8 justify-center w-full lg:w-1/3 h-full bg-coffee">
                        <h1 class="text-lg md:text-2xl font-bold text-brown-900">
                            Acerca de nosotros
                        </h1>
                        <p class="text-[8px] md:text-sm text-brown-500 font-medium">
                            Interactuar con los comentarios de las personas y sus feedback
                        </p>
                    </div>
                    <div class="w-2/3 bg-coffee rounded-r-4xl h-full hidden lg:block">
                        <div class="flex absolute gap-4 right-8 top-0 bottom-0 justify-center items-center">
                            <img src="{{ asset('images/fondo-hero2.png') }}" alt="fondo hero 2"
                                class="border-4 border-orange-300 shadow-lg object-cover w-40 h-48 lg:w-52 lg:h-64" />
                            <img src="{{ asset('images/fondo-hero2.png') }}" alt="fondo hero 2"
                                class="border-4 border-orange-300 shadow-lg object-cover w-40 h-48 lg:w-52 lg:h-64" />
                            <img src="{{ asset('images/fondo-hero2.png') }}" alt="fondo hero 2"
                                class="border-4 border-orange-300 shadow-lg object-cover w-40 h-48 lg:w-52 lg:h-64" />
                        </div>
                    </div>
                </div>
            </section>

            <footer class="bg-brown-800 text-gray-100">
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
