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
                <a href="{{ route('comprar_productos') }}"
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



                <div class="relative inline-block text-left">
                    <div>
                        <button id="dropdownButton" type="button"
                            class="bg-brown-400 p-2 rounded-full hover:bg-brown-200 group cursor-pointer size-10">
                            <x-heroicon-o-shopping-cart class="h-6 w-6 text-brown-100 group-hover:text-black" />
                        </button>
                    </div>

                    <div id="dropdownMenu"
                        class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                        <div class="py-1">

                            <p class="block px-4 py-2 text-sm font-bold">productos</p>
                            <div id="cartItems" class="max-h-60 overflow-y-auto">
                                <!-- Aquí se mostrarán los productos del carrito -->
                                <p class="block px-4 py-2 text-sm text-gray-700">Carrito vacío</p>

                            </div>

                            <a href="#"
                                class="flex justify-center bg-brown-400 py-2 px-4 rounded-xl text-white">Ir pagar</a>

                        </div>
                    </div>
                </div>


            </div>
        </header>

        <div class="h-screen z-10 relative mt-20">

            <?php
            if (isset($_GET['carrito'])) {
                $carrito = $_GET['carrito'];
                if (!is_array($carrito)) {
                    $carrito = json_decode($carrito, true);
                    $total = 0;
                    foreach ($carrito as $item) {
                        $total += $item['precio'] * $item['cantidad'];
                        $productos[] = [
                            'id' => $item['id'],
                            'nombre' => $item['nombre'],
                            'cantidad' => $item['cantidad'],
                            'precio' => $item['precio'],
                        ];
                    }
                    $total = 'Bs. ' . number_format($total, 2);
                } else {
                    $total = 'Carrito vacío';
                }
            }
            ?>

            <div class="container mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold text-brown-800 dark:text-brown-200 mb-6">Métodos de Pago</h1>
                <p class="text-gray-700 dark:text-gray-300 mb-4">Seleccione su método de pago preferido:</p>

                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                    <div class="bg-white dark:bg-brown-700 rounded-lg shadow-lg p-6 flex">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-semibold text-brown-800 dark:text-brown-200 mb-4">Monto total:
                                {{ $total }}</h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Pague de forma segura.</p>
                            <?php
                            use App\Models\MetodoPago;
                            $metodoPagos = MetodoPago::all();
                            ?>
                            <div class="flex flex-col gap-2 justify-center">
                                @foreach ($metodoPagos as $metodoPago)
                                    <button
                                        onclick="addCart({{ $metodoPago->id }}, '{{ $metodoPago->nombre }}', {{ $metodoPago->precio }})"
                                        class="bg-brown-500 text-white px-12 py-4 w-48 rounded hover:bg-brown-600 transition-colors mb-2 cursor-pointer">
                                        {{ $metodoPago->nombre }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <div id="productos" class="flex flex-col ml-6">
                            @if (isset($productos))
                                <h3 class="text-lg font-semibold text-brown-800 dark:text-brown-200">Productos
                                    seleccionados:</h3>
                                <ul class="list-disc pl-6">
                                    @foreach ($productos as $producto)
                                        <li class="text-gray-600 dark:text-gray-300">
                                            {{ $producto['nombre'] }} - Cantidad: {{ $producto['cantidad'] }}
                                            - Precio: Bs. {{ number_format($producto['precio'], 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-600 dark:text-gray-300">No hay productos seleccionados.</p>
                            @endif

                        </div>
                    </div>

                    {{-- <div class="bg-white dark:bg-brown-700 rounded-lg shadow-lg p-6">
                        <h2 class="text-xl font-semibold text-brown-800 dark:text-brown-200 mb-4">Transferencia Bancaria</h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Realice una transferencia desde su cuenta bancaria.</p>
                        <button onclick="addCart(2, 'Transferencia Bancaria', 0)"
                            class="bg-brown-500 text-white px-4 py-2 rounded hover:bg-brown-600 transition-colors">Seleccionar</button>
                    </div> --}}
                </div>
            </div>

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

        let carrito = [];

        function addCart(id, nombre, precio) {
            // Aquí puedes implementar la lógica para agregar un producto al carrito
            const producto = {
                id: id,
                nombre: nombre || "Producto " + id, // Nombre por defecto si no se pasa
                cantidad: 1
            };
            carrito.find((item) => item.id === id) ?
                carrito.map((item) =>
                    item.id === id ? {
                        ...item,
                        cantidad: item.cantidad + 1
                    } : item
                ) :
                carrito.push(producto);

            document.getElementById("cartItems").innerHTML = carrito
                .map((item) =>
                    `<p class="block px-4 py-2 text-sm text-gray-700">${item.nombre} - Cantidad: ${item.cantidad}</p>`)
                .join("");
        }

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

        const button = document.getElementById('dropdownButton');
        const menu = document.getElementById('dropdownMenu');

        button.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Opcional: cerrar el dropdown si haces clic fuera
        document.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
