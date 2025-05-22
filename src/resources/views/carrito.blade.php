<x-app-layout>
    <!-- Alertas -->
    @if(session('success'))
    <div id="alert-message" class="bg-[#D1E7DD] border border-[#166534] text-[#166534] px-4 py-3 rounded relative mx-auto max-w-7xl mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    @if(session('error'))
    <div id="alert-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-auto max-w-7xl mb-6" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="carrito()">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 border border-gray-200">
            <!-- Encabezado -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 pb-4 border-b border-emerald-500">
                <div class="flex items-center mb-4 sm:mb-0">
                    <svg class="w-8 h-8 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Carrito de ventas
                    </h2>
                </div>
                <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                    {{ count($carrito) }} {{ count($carrito) === 1 ? 'producto' : 'productos' }}
                </span>
            </div>

            @if(count($carrito) > 0)
            <!-- Formulario principal de venta -->
            <form id="ventaForm" action="{{ route('registrar.venta') }}" method="POST" @submit="syncForm()">
                @csrf
                
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Lista de productos -->
                    <div class="lg:w-2/3 space-y-6">
                        @foreach($carrito as $item)
                        <div class="flex flex-col sm:flex-row border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-200">
                            <!-- Imagen del producto -->
                            <div class="sm:w-1/4 bg-gray-100 flex items-center justify-center p-4">
                                <img class="h-32 w-full object-contain" src="{{ asset($item['imagen']) }}" alt="{{ $item['nombre'] }}">
                            </div>
                            
                            <!-- Detalles del producto -->
                            <div class="sm:w-3/4 p-4 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $item['nombre'] }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">SKU: {{ $item['id'] }}</p>
                                    </div>
                                    
                                    <!-- Botón eliminar (ahora con acción JavaScript) -->
                                    <button 
                                        type="button" 
                                        @click="eliminarProducto({{ $item['id'] }})"
                                        class="text-gray-400 hover:text-red-500 transition-colors" 
                                        title="Eliminar producto"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="mt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <!-- Precio unitario -->
                                    <div class="text-lg font-medium text-gray-900">
                                        {{ number_format($item['precio'], 2) }} Bs
                                    </div>
                                    
                                    <!-- Cantidad -->
                                    <div class="flex items-center gap-4">
                                        <label class="text-sm text-gray-600">Cantidad:</label>
                                        <input 
                                            type="number" 
                                            min="1"
                                            class="w-20 px-3 py-2 bg-gray-50 border border-gray-300 rounded-md text-gray-900 text-center focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                                            x-model.number="items[{{ $item['id'] }}].cantidad"
                                            @input="calcularTotal()"
                                        >
                                    </div>
                                    
                                    <!-- Subtotal -->
                                    <div class="text-lg font-medium text-emerald-600">
                                        <span x-text="(items[{{ $item['id'] }}].cantidad * {{ $item['precio'] }}).toFixed(2)"></span> Bs
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Campos ocultos para este producto -->
                        <input type="hidden" name="productos[{{ $loop->index }}][producto_id]" value="{{ $item['id'] }}">
                        <input type="hidden" :name="'productos[{{ $loop->index }}][cantidad]'" :value="items[{{ $item['id'] }}].cantidad">
                        <input type="hidden" name="productos[{{ $loop->index }}][precio_unitario]" value="{{ $item['precio'] }}">
                        <input type="hidden" :name="'productos[{{ $loop->index }}][sub_total]'" :value="(items[{{ $item['id'] }}].cantidad * {{ $item['precio'] }}).toFixed(2)">
                        @endforeach
                    </div>

                    <!-- Resumen de compra -->
                    <div class="lg:w-1/3">
                        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 sticky top-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">Resumen de compra</h3>
                            
                            <div class="space-y-4">
                                <!-- Total unidades -->
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Unidades:</span>
                                    <span class="text-gray-900 font-medium" x-text="calcularUnidades()"></span>
                                </div>
                                
                                <!-- Envío -->
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Envío:</span>
                                    <span class="text-emerald-600">Gratis</span>
                                </div>
                                
                                <!-- Total final -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                                    <span class="text-gray-900 font-bold">Total:</span>
                                    <span class="text-emerald-600 text-xl font-bold" x-text="total.toFixed(2) + ' Bs'"></span>
                                    <input type="hidden" name="total" :value="total.toFixed(2)">
                                </div>
                                
                                <!-- Método de pago -->
                                <div class="pt-4">
                                    <label for="tipo_pago" class="block text-sm font-medium text-gray-700 mb-2">Método de pago *</label>
                                    <select name="tipo_pago" id="tipo_pago" required
                                        class="w-full bg-white border border-gray-300 text-gray-900 rounded-md px-3 py-2 focus:ring-emerald-500 focus:border-emerald-500">
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Qr">Qr</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                    </select>
                                </div>
                                
                                <!-- Botón de compra -->
                                <button type="submit" form="ventaForm" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-4 rounded-md shadow-sm transition-colors duration-200 flex items-center justify-center mt-6">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Finalizar Venta
                                </button>
                                
                                <!-- Continuar comprando -->
                                <div class="pt-2">
                                    <a href="{{ route('productos.index') }}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                        </svg>
                                        Continuar comprando
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Formularios ocultos para eliminar productos -->
            @foreach($carrito as $item)
            <form id="eliminarForm-{{ $item['id'] }}" action="{{ route('carrito.quitar', $item['id']) }}" method="POST" class="hidden">
                @csrf
            </form>
            @endforeach
            @else
            <div class="text-center py-16">
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-emerald-100 mb-6">
                    <svg class="h-12 w-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 mb-2">Tu carrito está vacío</h3>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">No has agregado ningún producto a tu carrito de ventas.</p>
                <a href="{{ route('productos.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Explorar productos
                </a>
            </div>
            @endif
        </div>
    </div>

    <script>
        function carrito() {
            return {
                items: {
                    @foreach($carrito as $item)
                        {{ $item['id'] }}: {
                            cantidad: {{ $item['cantidad'] }},
                            precio: {{ $item['precio'] }}
                        },
                    @endforeach
                },
                total: 0,
                
                // Calcular el total de la venta
                calcularTotal() {
                    let total = 0;
                    for (let id in this.items) {
                        total += this.items[id].cantidad * this.items[id].precio;
                    }
                    this.total = total;
                },
                
                // Calcular el total de unidades
                calcularUnidades() {
                    let totalUnidades = 0;
                    for (let id in this.items) {
                        totalUnidades += this.items[id].cantidad;
                    }
                    return totalUnidades;
                },
                
                // Función para eliminar productos
                eliminarProducto(productoId) {
                    document.getElementById(`eliminarForm-${productoId}`).submit();
                },
                
                // Sincronizar el formulario antes de enviar
                syncForm() {
                    this.calcularTotal();
                    // Validar que el método de pago esté seleccionado
                    if (!document.getElementById('tipo_pago').value) {
                        alert('Por favor seleccione un método de pago');
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