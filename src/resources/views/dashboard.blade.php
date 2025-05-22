<x-app-layout>
    @if (session('success'))
        <div id="alert-message" class="bg-[#D1E7DD] border border-[#166534] text-[#166534] px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div id="alert-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="min-h-screen bg-[#F5F5F5] p-4 md:p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-[#2B2B2B]">Inicio</h1>
            <p class="text-[#A1A1A1]">Resumen de actividades</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Ventas -->
            <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#166534]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[#A1A1A1]">Ventas Totales</p>
                        <h3 class="text-2xl font-bold text-[#2B2B2B]">{{ number_format($ventas->count()) }}</h3>
                    </div>
                    <div class="bg-[#D1E7DD] p-3 rounded-full">
                        <svg class="w-6 h-6 text-[#166534]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-[#A1A1A1] mt-2">{{ number_format($ventas->sum('total'), 2) }} (Total)</p>
            </div>

            <!-- Productos -->
            <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#166534]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[#A1A1A1]">Productos</p>
                        <h3 class="text-2xl font-bold text-[#2B2B2B]">{{ number_format($productos->count()) }}</h3>
                    </div>
                    <div class="bg-[#D1E7DD] p-3 rounded-full">
                        <svg class="w-6 h-6 text-[#166534]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-[#A1A1A1] mt-2">{{ $categorias->count() }} categorías</p>
            </div>

            <!-- Compras -->
            <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#166534]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[#A1A1A1]">Compras</p>
                        <h3 class="text-2xl font-bold text-[#2B2B2B]">{{ number_format($compras->count()) }}</h3>
                    </div>
                    <div class="bg-[#D1E7DD] p-3 rounded-full">
                        <svg class="w-6 h-6 text-[#166534]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-[#A1A1A1] mt-2">{{ number_format($compras->sum('total'), 2) }} Bs (Total)</p>
            </div>

            <!-- Proveedores -->
            <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-[#166534]">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-[#A1A1A1]">Proveedores</p>
                        <h3 class="text-2xl font-bold text-[#2B2B2B]">{{ number_format($proveedores->count()) }}</h3>
                    </div>
                    <div class="bg-[#D1E7DD] p-3 rounded-full">
                        <svg class="w-6 h-6 text-[#166534]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <p class="text-sm text-[#A1A1A1] mt-2">{{ $user->count() }} usuarios</p>
            </div>
        </div>

        <!-- Gráficos y Tablas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Ventas Recientes -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-[#2B2B2B]">Ventas Recientes</h3>
                    {{--                     <a href="" class="text-[#166534] hover:text-[#0F4D28] text-sm">Ver todas</a> --}}
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#D1E7DD]">
                        <thead class="bg-[#F5F5F5]">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Fecha</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Total</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#D1E7DD]">
                            @foreach ($ventas->take(5) as $venta)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-[#2B2B2B]">#{{ $venta->id }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-[#A1A1A1]">
                                        {{ $venta->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-[#2B2B2B]">
                                        {{ number_format($venta->total, 2) }} Bs</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#D1E7DD] text-[#166534]">Completado</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Productos con Bajo Stock -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-[#2B2B2B]">Productos con Bajo Stock</h3>
                    <a href="{{ route('productos.index') }}" class="text-[#166534] hover:text-[#0F4D28] text-sm">Ver
                        todos</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#D1E7DD]">
                        <thead class="bg-[#F5F5F5]">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Producto</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Categoría</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Stock</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-[#A1A1A1] uppercase tracking-wider">
                                    Precio</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#D1E7DD]">
                            @foreach ($productos->sortBy('stock')->take(5) as $producto)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                    src="{{ $producto->imagen ?? 'https://via.placeholder.com/40' }}"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-[#2B2B2B]">
                                                    {{ $producto->nombre }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-[#A1A1A1]">
                                        {{ $producto->categoria->nombre ?? 'N/A' }}
                                    </td>
                                    <td
                                        class="px-4 py-3 whitespace-nowrap text-sm {{ $producto->stock < 5 ? 'text-red-600 font-bold' : 'text-[#2B2B2B]' }}">
                                        {{ $producto->stock }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-[#2B2B2B]">
                                        {{ number_format($producto->precio_venta, 2) }} Bs
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Script para ocultar alertas después de 5 segundos -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertMessage = document.getElementById('alert-message');
                if (alertMessage) {
                    setTimeout(() => {
                        alertMessage.style.display = 'none';
                    }, 5000);
                }
            });
        </script>
</x-app-layout>
