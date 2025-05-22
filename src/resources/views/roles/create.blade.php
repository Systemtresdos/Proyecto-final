<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded max-w-7xl mx-auto">
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

    <div class="min-h-screen py-8 bg-[#F5F5F5]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tarjeta del formulario -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <!-- Encabezado con estilo consistente -->
                <div class="p-6 bg-gradient-to-r from-[#D1E7DD] to-[#D1E7DD]/70 border-b border-[#D1E7DD]">
                    <div class="flex items-center space-x-3">
                        <div>
                            <h3 class="text-2xl font-bold text-[#2B2B2B]">Crear Nuevo Rol</h3>
                            <p class="text-sm text-[#A1A1A1] mt-1">Defina los permisos y características del nuevo rol
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="p-6 md:p-8">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        <!-- Campo Nombre -->
                        <div class="mb-6">
                            <label for="nombre" class="block text-sm font-medium text-[#2B2B2B] mb-1">Nombre del Rol
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="nombre" id="nombre"
                                class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534]
                                          transition duration-200 placeholder-[#A1A1A1]/70"
                                value="{{ old('nombre') }}" required placeholder="Ej: Administrador, Editor, Usuario" />
                        </div>

                        <!-- Campo Descripción -->
                        <div class="mb-8">
                            <label for="descripcion"
                                class="block text-sm font-medium text-[#2B2B2B] mb-1">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534]
                                          transition duration-200 placeholder-[#A1A1A1]/70"
                                placeholder="Describa las funciones y permisos de este rol">{{ old('descripcion') }}</textarea>
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pt-6">
                            <a href="{{ route('roles.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 border border-[#A1A1A1] rounded-lg shadow-sm text-sm font-medium text-[#2B2B2B] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/50 transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#166534] hover:bg-[#0e4a24] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/80 transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Registrar Rol
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
