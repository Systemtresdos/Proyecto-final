<x-app-layout>
    <!-- Alertas -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="carritoCompras()">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-200">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800">
                        Carrito de Compras
                    </h2>
                </div>
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                    <span x-text="Object.keys(items).length"></span> productos
                </span>
            </div>

            @if (count($carritoCompra) > 0)
                <!-- Formulario principal -->
                <form id="compraForm" action="{{ route('registrar.compra') }}" method="POST" @submit="syncForm()">
                    @csrf

                    <!-- Lista de productos -->
                    <div class="space-y-4 mb-8">
                        @foreach ($carritoCompra as $item)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <!-- Imagen del producto -->
                                    <div class="sm:w-1/5 flex items-center justify-center bg-gray-100 rounded p-2">
                                        <img class="h-20 w-full object-contain" src="{{ asset($item['imagen']) }}"
                                            alt="{{ $item['nombre'] }}">
                                    </div>

                                    <!-- Detalles del producto -->
                                    <div class="sm:w-4/5 flex flex-col sm:flex-row justify-between gap-4">
                                        <div>
                                            <h3 class="font-medium text-gray-900">{{ $item['nombre'] }}</h3>

                                        </div>

                                        <div class="flex flex-col sm:flex-row items-end sm:items-center gap-4">
                                            <!-- Dentro de tu bucle foreach -->
                                            <div>
                                                <label class="text-gray-600">Precio paquete</label>
                                                <input type="number"
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                                                    min="1"
                                                    x-model.number="items[{{ $item['id'] }}].precioPaquete"
                                                    @input="calcularPrecio({{ $item['id'] }})">
                                            </div>
                                            <div>
                                                <label class="text-gray-600">Cantidad de paquetes</label>
                                                <input type="number"
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                                                    x-model.number="items[{{ $item['id'] }}].cantidadPaquete"
                                                    @input="calcularCantidad({{ $item['id'] }})">
                                            </div>
                                            <div>
                                                <label class="text-gray-600">Unidades por paquete</label>
                                                <input type="number"
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                                                    x-model.number="items[{{ $item['id'] }}].unidadesPaquete"
                                                    @input="calcularPrecio({{ $item['id'] }}); calcularCantidad({{ $item['id'] }})">
                                            </div>

                                            <!-- Cantidad -->
                                            <div class="flex items-center gap-2">
                                                <label class="text-sm text-gray-600">Cantidad:</label>
                                                <input type="number" min="1"
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                                                    x-model.number="items[{{ $item['id'] }}].cantidad"
                                                    @input="calcularTotal()">
                                            </div>

                                            <!-- Precio unitario -->
                                            <div class="text-sm">
                                                <span class="text-gray-600">Precio:</span>
                                                <input type="text"
                                                    class="w-20 px-2 py-1 border border-gray-300 rounded text-center"
                                                    x-model.number="items[{{ $item['id'] }}].precio"
                                                    :value="items[{{ $item['id'] }}].precio.toFixed(2) + ' Bs'">
                                                <span class="font-medium text-orange-500"></span>
                                            </div>

                                            <!-- Subtotal -->
                                            <div class="text-sm">
                                                <span class="text-gray-600">Subtotal:</span>
                                                <span class="font-medium text-blue-600"
                                                    x-text="(items[{{ $item['id'] }}].cantidad * items[{{ $item['id'] }}].precio).toFixed(2) + ' Bs'"></span>
                                            </div>

                                            <!-- Precio venta -->
                                            <div class="text-sm">
                                                <span class="text-gray-600">Precio venta:</span>
                                                <span class="font-medium text-green-600"
                                                    x-text="precioVenta({{ $item['id'] }})"></span>
                                            </div>

                                            <!-- Botón eliminar -->
                                            <button type="button" @click="eliminarProducto({{ $item['id'] }})"
                                                class="text-gray-400 hover:text-red-500" title="Eliminar producto">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Campos ocultos -->
                                <input type="hidden" name="productos[{{ $loop->index }}][producto_id]"
                                    value="{{ $item['id'] }}">
                                <input type="hidden" :name="'productos[{{ $loop->index }}][cantidad]'"
                                    :value="items[{{ $item['id'] }}].cantidad">
                                <input type="hidden" name="productos[{{ $loop->index }}][precio_unitario]"
                                    :value="items[{{ $item['id'] }}].precio">
                                <input type="hidden" :name="'productos[{{ $loop->index }}][sub_total]'"
                                    :value="(items[{{ $item['id'] }}].cantidad * items[{{ $item['id'] }}].precio).toFixed(
                                        2)">
                            </div>
                        @endforeach
                    </div>

                    <!-- Resumen de compra -->
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">Resumen de
                            Compra</h3>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Unidades:</span>
                                <span class="font-medium" x-text="calcularUnidades()"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-medium" x-text="total.toFixed(2) + ' Bs'"></span>
                            </div>
                            <div class="flex justify-between pt-3 border-t border-gray-200">
                                <span class="font-bold">Total:</span>
                                <span class="font-bold text-blue-600" x-text="total.toFixed(2) + ' Bs'"></span>
                                <input type="hidden" name="total" id="total" :value="total.toFixed(2)">
                            </div>
                        </div>

                        <!-- Proveedor -->
                        <div class="mb-4">
                            <label for="proveedor" class="block text-sm font-medium text-gray-700 mb-1">Proveedor
                                *</label>
                            <select id="proveedor" name="proveedor_id" required
                                class="w-full border border-gray-300 rounded px-3 py-2">
                                <option value="">Seleccione proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-4">
                            <a href="{{ route('productos.index') }}"
                                class="px-4 py-2 border border-gray-300 rounded text-gray-700 text-center hover:bg-gray-50">
                                Continuar comprando
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Confirmar Compra
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Formularios ocultos para eliminar productos -->
                @foreach ($carritoCompra as $item)
                    <form id="eliminarForm-{{ $item['id'] }}"
                        action="{{ route('carritoCompra.quitar', $item['id']) }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endforeach
            @else
                <div class="text-center py-12">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-blue-100 mb-4">
                        <svg class="h-10 w-10 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Tu carrito de compras está vacío</h3>
                    <p class="text-gray-600 mb-6">No has agregado ningún producto para comprar.</p>
                    <a href="{{ route('productos.index') }}"
                        class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Ver productos
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        function carritoCompras() {
            return {
                items: {
                    @foreach ($carritoCompra as $item)
                        {{ $item['id'] }}: {
                            cantidad: {{ $item['cantidad'] }},
                            precioOriginal: {{ $item['precio'] }},
                            precio: {{ $item['precio'] }},
                            precioPaquete: 0,
                            unidadesPaquete: 0,
                            cantidadPaquete: 0,
                        },
                    @endforeach
                },
                total: 0,

                // Calcular precio unitario basado en paquete
                calcularPrecio(productoId) {
                    const item = this.items[productoId];
                    if (item.unidadesPaquete > 0 && item.precioPaquete > 0) {
                        item.precio = item.precioPaquete / item.unidadesPaquete;
                    } else {
                        item.precio = item.precioOriginal;
                    }
                    this.calcularTotal();
                },

                // Calcular cantidad total basada en paquetes
                calcularCantidad(productoId) {
                    const item = this.items[productoId];
                    if (item.unidadesPaquete > 0 && item.cantidadPaquete > 0) {
                        item.cantidad = item.cantidadPaquete * item.unidadesPaquete;
                    }
                    this.calcularTotal();
                },

                precioVenta(productoId) {
                    const item = this.items[productoId];
                    const precio = item.precio * 1.3; // 30% de margen
                    return precio.toFixed(2) + ' Bs';
                },

                // Calcular el total de la compra
                calcularTotal() {
                    this.total = Object.values(this.items).reduce((sum, item) => {
                        return sum + (item.cantidad * item.precio);
                    }, 0);
                },

                // Calcular el total de unidades
                calcularUnidades() {
                    return Object.values(this.items).reduce((sum, item) => {
                        return sum + item.cantidad;
                    }, 0);
                },

                eliminarProducto(productoId) {
                    document.getElementById(`eliminarForm-${productoId}`).submit();
                },

                // Sincronizar el formulario antes de enviar
                syncForm() {
                    this.calcularTotal();
                    if (!document.getElementById('proveedor').value) {
                        alert('Por favor seleccione un proveedor');
                        return false;
                    }
                    return true;
                },

                // Inicialización
                init() {
                    this.calcularTotal();
                }
            }
        }
    </script>
</x-app-layout>
