<x-app-layout>
    <!-- Alertas -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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

    <div class="py-6 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-[#D1E7DD] overflow-hidden">
                <!-- Header -->
                <div class="p-4 border-b border-[#D1E7DD]">
                    <h3 class="text-lg font-semibold text-[#2B2B2B]">Modificar Rol: {{ $roles->nombre }}</h3>
                </div>

                <!-- Formulario -->
                <div class="p-6">
                    <form action="{{ route('roles.update', $roles->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campo Nombre -->
                        <div class="mb-6">
                            <label for="nombre" class="block text-sm font-medium text-[#2B2B2B] mb-2">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="w-full px-3 py-2 border border-[#A1A1A1]/30 rounded-md shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534] focus:border-[#166534]"
                                value="{{ old('nombre', $roles->nombre) }}" required
                                placeholder="Ingrese el nombre de la categoría" />
                        </div>

                        <!-- Campo Descripción -->
                        <div class="mb-6">
                            <label for="descripcion"
                                class="block text-sm font-medium text-[#2B2B2B] mb-2">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-3 py-2 border border-[#A1A1A1]/30 rounded-md shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534] focus:border-[#166534]"
                                placeholder="Ingrese una descripción (opcional)">{{ old('descripcion', $roles->descripcion) }}</textarea>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('roles.index') }}"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-md transition duration-200">
                                Cancelar
                            </a>
                            <button type="submit"
                                class="bg-[#166534] hover:bg-[#0e4a24] text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
