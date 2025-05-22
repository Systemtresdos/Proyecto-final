<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Joyería Elegante') }}</title>

    <!-- Tipografía elegante -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Estilos y Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-sans antialiased bg-[#fdfdfd] text-[#333] h-screen overflow-hidden">
    <div x-data="{ open: false }" class="flex flex-col h-screen">

        <!-- Topbar para todas las pantallas -->
        <header class="bg-white shadow-md p-4 flex items-center justify-between">
            <div class="flex items-center">
                <!-- Botón hamburguesa SOLO en móviles -->
                <button @click="open = !open" class="text-gray-400 focus:outline-none lg:hidden hover:text-[#166534]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="ml-4 text-lg font-semibold">PANDORA</h1>
            </div>

            <!-- Espacio para usuario y carrito -->
            <div class="flex items-center space-x-6">
                <span class="text-sm font-medium text-[#2B2B2B] whitespace-nowrap">Hola, {{ $usuario->nombre }}
                    👋</span>

                @if ($usuario->rol_id == '1')
                    <!-- Botón del carrito compras -->
                    <div class="relative">
                        <a href="{{ route('carrito.compras') }}"
                            class="relative inline-flex items-center justify-center text-gray-700 hover:text-[#166534] transition">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                            </svg>
                            @php
                                $cantidadCompra = session('carritoCompra') ? count(session('carritoCompra')) : 0;
                            @endphp
                            @if ($cantidadCompra > 0)
                                <span
                                    class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                                    {{ $cantidadCompra }}
                                </span>
                            @endif
                        </a>
                    </div>
                @endif
                <!-- Botón del carrito -->
                <div class="relative">
                    <a href="{{ route('carrito') }}"
                        class="relative inline-flex items-center justify-center text-gray-700 hover:text-[#166534] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        @php
                            $cantidadCarrito = session('carrito') ? count(session('carrito')) : 0;
                        @endphp
                        @if ($cantidadCarrito > 0)
                            <span
                                class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                                {{ $cantidadCarrito }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </header>

        <div class="flex flex-1 overflow-hidden">

            <!-- Sidebar -->
            <div :class="open ? 'translate-x-0' : '-translate-x-full'"
                class="fixed z-30 lg:static lg:translate-x-0 transition-transform duration-300 ease-in-out w-64 bg-white shadow-lg overflow-y-auto h-full">
                @include('layouts.menu')
            </div>

            <!-- Overlay en móviles -->
            <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <!-- Main content -->
            <div class="flex-1 overflow-y-auto bg-[#f8f8f8] p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </div>

        </div>
    </div>
</body>

</html>
