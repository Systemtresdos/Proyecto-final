<x-app-layout>
    <!-- Alertas -->
    @if (session('success'))
        <div id="alert-message"
            class="bg-[#D1E7DD] border border-[#166534] text-[#166534] px-4 py-3 rounded relative mx-auto max-w-7xl mb-6"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div id="alert-message"
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto max-w-7xl mb-6"
            role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="py-8 space-y-8 bg-[#F5F5F5] min-h-screen">
        <!-- Formularios de búsqueda -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Buscar producto -->
                <form action="{{ route('productos_buscar') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-sm border border-[#D1E7DD]" x-data="{ nombre: '' }">
                    @csrf
                    <h3 class="text-lg font-semibold text-[#2B2B2B] mb-4">Buscar producto</h3>
                    <div class="flex space-x-2">
                        <input type="search" name="nombre" x-model="nombre"
                            class="flex-1 border border-[#A1A1A1] rounded-lg p-2 focus:ring-2 focus:ring-[#166534] focus:border-[#166534]"
                            placeholder="Nombre del producto">
                        <button type="submit" :disabled="nombre.trim() === ''"
                            class="bg-[#166534] hover:bg-[#0F4D28] text-white px-4 py-2 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Filtrar por categoría -->
                <form action="{{ route('buscar_por_categoria') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-sm border border-[#D1E7DD]">
                    @csrf
                    <h3 class="text-lg font-semibold text-[#2B2B2B] mb-4">Filtrar productos</h3>
                    <div class="flex space-x-2">
                        <select name="categoria_id" id="categoria_id"
                            class="flex-1 border border-[#A1A1A1] rounded-lg p-2 focus:ring-2 focus:ring-[#166534] focus:border-[#166534]">
                            <option value="">Todos</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit"
                            class="bg-[#166534] hover:bg-[#0F4D28] text-white px-4 py-2 rounded-lg transition-colors">
                            Filtrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @php $modo = $modo ?? 'individual'; @endphp

        <!-- Vista individual (tarjetas) -->
        @if ($modo === 'individual')
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="grid 
                {{ count($productos) === 1 ? 'place-items-center' : 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4' }} 
                gap-6">
                    @foreach ($productos as $producto)
                        <div
                            class="bg-white rounded-lg shadow-sm overflow-hidden border border-[#D1E7DD] hover:shadow-md transition-shadow w-full max-w-sm">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-[#2B2B2B] mb-2">{{ $producto->nombre }}</h3>
                                <div class="h-48 w-full mb-3 bg-[#F5F5F5] rounded-lg overflow-hidden">
                                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <p class="text-sm text-[#A1A1A1] mb-2 line-clamp-2">{{ $producto->descripcion }}</p>
                                <div class="space-y-1 text-sm">
                                    <p class="text-[#2B2B2B]">
                                        <span class="font-medium">Código:</span>
                                        <span class="font-medium text-[#3B82F6]">{{ $producto->codigo }}</span>
                                    </p>
                                    <p class="text-[#2B2B2B]">
                                        <span class="font-medium">Stock:</span>
                                        <span
                                            class="font-medium {{ $producto->stock > 4 ? 'text-[#166534]' : 'text-[#EF4444]' }}">
                                            {{ $producto->stock }}
                                        </span>
                                    </p>
                                    <p class="text-lg font-semibold text-[#166534]">
                                        ${{ number_format($producto->precio_venta, 2) }}</p>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-[#F5F5F5] border-t border-[#D1E7DD]">
                                <div class="flex justify-between space-x-2">
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST"
                                        class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full bg-[#166534] hover:bg-[#0F4D28] text-white px-3 py-1 rounded text-sm transition-colors">
                                            Agregar
                                        </button>
                                    </form>
                                    @if ($usuario->rol_id == '1')
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                            class="flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-full bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-sm transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                        <form action="{{ route('actualizar.producto', $producto->id) }}" method="GET"
                                            class="flex-1">
                                            <button type="submit"
                                                class="w-full bg-[#D1E7DD] hover:bg-[#B8D5C7] text-[#166534] px-3 py-1 rounded text-sm transition-colors">
                                                Modificar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if ($modo === 'lista')
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-lg shadow-sm border border-[#D1E7DD] overflow-hidden">

                    <div class=" p-4 border-b border-[#D1E7DD]">
                        <h3 class="text-lg font-semibold text-[#2B2B2B]">Lista de Productos</h3>
                        <p class="text-sm text-[#A1A1A1]">{{ $productos->count() }} productos encontrados</p>
                    </div>

                    <!-- Tabla para desktop -->
                    <div class="hidden lg:block">
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-[#D1E7DD]">
                                <thead class="bg-[#F5F5F5]">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">
                                            Producto</th>
                                        <th scope="col"
                                            class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">
                                            Código</th>
                                        <th scope="col"
                                            class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">
                                            Stock</th>
                                        <th scope="col"
                                            class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">
                                            Precio</th>
                                        <th scope="col"
                                            class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-[#D1E7DD]">
                                    @foreach ($productos as $producto)
                                        <tr class="hover:bg-[#F5F5F5] transition-colors">
                                            <td class="px-4 py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0 h-40 w-44">
                                                        <img src="{{ asset($producto->imagen) }}"
                                                            alt="{{ $producto->nombre }}"
                                                            class="h-full w-full object-cover rounded-lg">
                                                    </div>
                                                    <div class="w-auto">
                                                        <h4 class="text-sm font-medium text-[#2B2B2B]">
                                                            {{ $producto->nombre }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-[#3B82F6]">
                                                {{ $producto->codigo }}</td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm font-medium {{ $producto->stock > 4 ? 'text-[#166534]' : 'text-[#EF4444]' }}">
                                                {{ $producto->stock }}
                                            </td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap text-sm font-semibold text-[#166534]">
                                                ${{ number_format($producto->precio_venta, 2) }}</td>
                                            <td class="px-2 py-4 whitespace-nowrap">
                                                <div class="flex flex-wrap gap-2 justify-start">
                                                    <form action="{{ route('carrito.agregar', $producto->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-[#166534] hover:bg-[#0F4D28] text-white px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                            Agregar
                                                        </button>
                                                    </form>
                                                    @if ($usuario->rol_id == '1')
                                                        <form
                                                            action="{{ route('carritoCompra.agregar', $producto->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="bg-fuchsia-300 hover:bg-fuchsia-800 text-white px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                                AgregarCompra
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('productos.destroy', $producto->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="{{ route('actualizar.producto', $producto->id) }}"
                                                            method="GET">
                                                            <button type="submit"
                                                                class="bg-[#D1E7DD] hover:bg-[#B8D5C7] text-[#166534] px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                                Modificar
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Lista para móviles -->
                    <div class="lg:hidden divide-y divide-[#D1E7DD]">
                        @foreach ($productos as $producto)
                            <div class="p-4 hover:bg-[#F5F5F5] transition-colors">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 h-28 w-28">
                                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                            class="h-full w-full rounded-lg object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-[#2B2B2B]">{{ $producto->nombre }}</h4>
                                        <p class="text-xs text-[#A1A1A1] mt-1 line-clamp-2">
                                            {{ $producto->descripcion }}</p>
                                        <div class="mt-2 grid grid-cols-2 gap-x-4 gap-y-1 text-xs">
                                            <div>
                                                <span class="font-medium text-[#2B2B2B]">Código:</span>
                                                <span
                                                    class="font-medium text-[#3B82F6]">{{ $producto->codigo }}</span>
                                            </div>
                                            <div>
                                                <span class="font-medium text-[#2B2B2B]">Stock:</span>
                                                <span
                                                    class="font-medium {{ $producto->stock > 4 ? 'text-[#166534]' : 'text-[#EF4444]' }}">
                                                    {{ $producto->stock }}
                                                </span>
                                            </div>
                                            <div class="col-span-2">
                                                <span class="font-medium text-[#2B2B2B]">Precio:</span>
                                                <span
                                                    class="font-semibold text-[#166534]">${{ number_format($producto->precio_venta, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-2 justify-end">
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-[#166534] hover:bg-[#0F4D28] text-white px-3 py-1 rounded text-xs transition-colors">
                                            Agregar
                                        </button>
                                    </form>
                                    @if ($usuario->rol_id == '1')
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                        <form action="{{ route('actualizar.producto', $producto->id) }}"
                                            method="GET" class="inline">
                                            <button type="submit"
                                                class="bg-[#D1E7DD] hover:bg-[#B8D5C7] text-[#166534] px-3 py-1 rounded text-xs transition-colors">
                                                Modificar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Script para ocultar alertas -->
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
