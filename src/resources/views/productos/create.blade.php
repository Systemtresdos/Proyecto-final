<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded max-w-7xl mx-auto">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <strong>Error!</strong> Por favor corrige los siguientes errores:
            </div>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="min-h-screen py-8 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tarjeta del formulario -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <!-- Encabezado con estilo consistente -->
                <div class="p-6 bg-gradient-to-r from-[#D1E7DD] to-[#D1E7DD]/70 border-b border-[#D1E7DD]">
                    <div class="flex items-center space-x-3">
                        <div>
                            <h3 class="text-2xl font-bold text-[#2B2B2B]">Registrar Nuevo Producto</h3>
                            <p class="text-sm text-[#A1A1A1] mt-1">Complete los campos requeridos</p>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="p-6 md:p-8">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <!-- Información básica -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-[#2B2B2B] mb-1">Nombre del
                                    Producto <span class="text-red-500">*</span></label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                    class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">
                            </div>

                            <!-- Código -->
                            <div>
                                <label for="codigo"
                                    class="block text-sm font-medium text-[#2B2B2B] mb-1">Código</label>
                                <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}"
                                    class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion"
                                class="block text-sm font-medium text-[#2B2B2B] mb-1">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="3"
                                class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">{{ old('descripcion') }}</textarea>
                        </div>

                        <!-- Imagen al centro -->
                        <div class="flex flex-col items-center">
                            <label for="imagen" class="block text-sm font-medium text-[#2B2B2B] mb-2">Imagen del
                                Producto</label>
                            <input type="file" name="imagen" id="imagen" accept="image/*"
                                onchange="mostrarImagen(event)"
                                class="block w-full text-sm text-[#2B2B2B] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#D1E7DD] file:text-[#166534] hover:file:bg-[#D1E7DD]/80 max-w-xs">
                            <img id="preview" class="mt-4 rounded-lg border border-[#A1A1A1]/30 hidden"
                                width="200">
                        </div>

                        <!-- Inventario y categoría -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Stock -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-[#2B2B2B] mb-1">Stock
                                    Inicial <span class="text-red-500">*</span></label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                                    class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">
                            </div>

                            <!-- Categoría -->
                            <div>
                                <label for="categoria_id"
                                    class="block text-sm font-medium text-[#2B2B2B] mb-1">Categoría <span
                                        class="text-red-500">*</span></label>
                                <select name="categoria_id" id="categoria_id"
                                    class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Precio venta -->
                            <div>
                                <label for="precio_venta" class="block text-sm font-medium text-[#2B2B2B] mb-1">Precio
                                    de Venta (Bs) <span class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="precio_venta" id="precio_venta"
                                    value="{{ old('precio_venta') }}"
                                    class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534] transition duration-200">
                            </div>
                        </div>
                        <!-- Botones consistentes -->
                        <div
                            class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6 border-t border-[#A1A1A1]/30">
                            <a href="{{ route('productos.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 border border-[#A1A1A1] rounded-lg shadow-sm text-sm font-medium text-[#2B2B2B] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/50 transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#166534] hover:bg-[#0e4a24] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/80 transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Registrar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function mostrarImagen(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
