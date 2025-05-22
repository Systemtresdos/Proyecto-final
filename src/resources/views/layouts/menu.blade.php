<div class="min-h-screen bg-[#F5F5F5] p-4 w-64">
    <!-- Encabezado con logo/título -->
    <div class="mb-8 px-3 py-4 border-b border-[#D1E7DD]">
        <h1 class="text-2xl font-bold text-[#166534]">MENU</h1>
    </div>

    <nav class="space-y-1" x-data="{
        productosOpen: false,
        categoriasOpen: false,
        proveedoresOpen: false,
        usuariosOpen: false,
        rolesOpen: false,
        comprasOpen: false,
        ventasOpen: false,
        reportesOpen: false,
        inventarioOpen: false
    }">
        <!-- Inicio -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            Inicio
        </a>

        <!-- Productos -->
        <div>
            <button @click="productosOpen = !productosOpen"
                class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Productos</span>
                </div>
                <svg :class="{ 'rotate-90': productosOpen }" class="h-4 w-4 transition-transform transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <div x-show="productosOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                <a href="{{ route('productos.index') }}"
                    class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Lista
                    de Productos</a>
                @if ($usuario->rol_id == '1')
                    <a href="{{ route('productos.create') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nuevo
                        Producto</a>
                @endif
            </div>
        </div>
        @if ($usuario->rol_id == '1')
            <!-- Categorías -->
            <div>
                <button @click="categoriasOpen = !categoriasOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M17 10a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v5zm-7-4a1 1 0 11-2 0 1 1 0 012 0zm0 4a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Categorías</span>
                    </div>
                    <svg :class="{ 'rotate-90': categoriasOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="categoriasOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="{{ route('categorias.index') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Lista
                        de Categorías</a>
                    <a href="{{ route('categorias.create') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nueva
                        Categoría</a>
                </div>
            </div>

            <!-- Proveedores -->
            <div>
                <button @click="proveedoresOpen = !proveedoresOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Proveedores</span>
                    </div>
                    <svg :class="{ 'rotate-90': proveedoresOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="proveedoresOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="{{ route('proveedores.index') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Lista
                        de Proveedores</a>
                    <a href="{{ route('proveedores.create') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nuevo
                        Proveedor</a>
                </div>
            </div>

            <!-- Compras -->
            <div>
                <button @click="comprasOpen = !comprasOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Compras</span>
                    </div>
                    <svg :class="{ 'rotate-90': comprasOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="comprasOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Historial</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nueva
                        Compra</a>
                </div>
            </div>

            <!-- Ventas -->
            <div>
                <button @click="ventasOpen = !ventasOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Ventas</span>
                    </div>
                    <svg :class="{ 'rotate-90': ventasOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="ventasOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Historial</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nueva
                        Venta</a>
                </div>
            </div>

            <!-- Usuarios -->
            <div>
                <button @click="usuariosOpen = !usuariosOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Usuarios</span>
                    </div>
                    <svg :class="{ 'rotate-90': usuariosOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="usuariosOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="{{ route('usuarios.index') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Lista
                        de Usuarios</a>
                    <a href="{{ route('usuarios.create') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nuevo
                        Usuario</a>
                </div>
            </div>

            <!-- Roles -->

            <div>
                <button @click="rolesOpen = !rolesOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Roles</span>
                    </div>
                    <svg :class="{ 'rotate-90': rolesOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="rolesOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="{{ route('roles.index') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Lista
                        de Roles</a>
                    <a href="{{ route('roles.create') }}"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Nuevo
                        Rol</a>
                </div>
            </div>

            <!-- Inventario -->
            <div>
                <button @click="inventarioOpen = !inventarioOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Inventario</span>
                    </div>
                    <svg :class="{ 'rotate-90': inventarioOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="inventarioOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Stock
                        Actual</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Movimientos</a>
                </div>
            </div>

            <!-- Reportes -->
            <div>
                <button @click="reportesOpen = !reportesOpen"
                    class="w-full flex items-center justify-between px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Reportes</span>
                    </div>
                    <svg :class="{ 'rotate-90': reportesOpen }" class="h-4 w-4 transition-transform transform"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="reportesOpen" x-collapse class="ml-8 mt-1 space-y-1 border-l-2 border-[#D1E7DD]">
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Ventas</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Compras</a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">Inventario</a>
                </div>
            </div>

            <!-- Kardex -->
            <a href="#"
                class="flex items-center px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd" />
                </svg>
                Kardex
            </a>
        @endif
        <!-- Cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" class="pt-4 mt-4 border-t border-[#D1E7DD]">
            @csrf
            <button type="submit"
                class="w-full flex items-center px-4 py-3 text-[#2B2B2B] hover:bg-[#D1E7DD] hover:text-[#166534] rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                        clip-rule="evenodd" />
                </svg>
                Cerrar sesión
            </button>
        </form>
    </nav>
</div>
