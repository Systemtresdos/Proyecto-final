<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
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
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                <div class="p-6 bg-gradient-to-r from-[#D1E7DD] to-[#D1E7DD]/70 border-b border-[#D1E7DD]">
                    <div class="flex items-center space-x-3">
                        <div>
                            <h3 class="text-2xl font-bold text-[#2B2B2B]">Crear Nueva Categoría</h3>
                            <p class="text-sm text-[#A1A1A1] mt-1">Complete los campos requeridos</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="nombre" class="block text-sm font-medium text-[#2B2B2B] mb-2">
                                Nombre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nombre" id="nombre"
                                class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534]
                                          transition duration-200 placeholder-[#A1A1A1]/70"
                                value="{{ old('nombre') }}" required placeholder="Nombre unico" />
                        </div>

                        <div class="mb-8">
                            <label for="descripcion"
                                class="block text-sm font-medium text-[#2B2B2B] mb-2">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4"
                                class="w-full px-4 py-3 border border-[#A1A1A1]/30 rounded-lg shadow-sm 
                                          focus:outline-none focus:ring-2 focus:ring-[#166534]/50 focus:border-[#166534]
                                          transition duration-200 placeholder-[#A1A1A1]/70"
                                placeholder="Describa las características de esta categoría (opcional)">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3">
                            <a href="{{ route('categorias.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 border border-[#A1A1A1] rounded-lg shadow-sm text-sm font-medium text-[#2B2B2B] bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/50 transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#166534] hover:bg-[#0e4a24] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#166534]/80 transition duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Registrar Categoría
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
