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
    
    <div class="py-6 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-[#D1E7DD] overflow-hidden">
                
                <!-- Header -->
                <div class="p-4 border-b border-[#D1E7DD]">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-[#2B2B2B]">Gestión de Proveedores</h3>
                            <p class="text-sm text-[#A1A1A1]">{{ $proveedors->count() }} proveedores encontrados</p>
                        </div>
                        <a href="{{ route('proveedores.create') }}" class="bg-[#166534] hover:bg-[#0e4a24] text-white px-3 py-1.5 rounded-md text-sm font-medium transition duration-200">
                            + Nuevo Proveedor
                        </a>
                    </div>
                </div>
                
                <!-- Tabla para desktop -->
                <div class="hidden lg:block">
                    <div class="overflow-x-auto">
                        <table class="w-full divide-y divide-[#D1E7DD]">
                            <thead class="bg-[#F5F5F5]">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">Nombre</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">Contacto</th>
                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">Teléfono</th>
                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">Descripción</th>
                                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-[#2B2B2B] uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-[#D1E7DD]">
                                @foreach($proveedors as $proveedor)
                                <tr class="hover:bg-[#F5F5F5] transition-colors">
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-[#2B2B2B]">{{ $proveedor->nombre }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-[#2B2B2B]">{{ $proveedor->nombre_contacto }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap text-sm text-[#2B2B2B]">{{ $proveedor->telefono }}</td>
                                    <td class="px-2 py-4 text-sm text-[#2B2B2B]">{{ $proveedor->descripcion }}</td>
                                    <td class="px-2 py-4 whitespace-nowrap">
                                        <div class="flex flex-wrap gap-2 justify-start">
                                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="bg-[#D1E7DD] hover:bg-[#B8D5C7] text-[#166534] px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                Editar
                                            </a>
                                            <form id="delete-form{{ $proveedor->id }}" action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $proveedor->id }})" class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded text-xs transition-colors whitespace-nowrap">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Lista para móviles -->
                <div class="lg:hidden">
                    @if($proveedors->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-[#A1A1A1]">No hay proveedores registrados aún.</p>
                    </div>
                    @else
                    <div class="divide-y divide-[#D1E7DD]">
                        @foreach($proveedors as $proveedor)
                        <div class="p-4 hover:bg-[#F5F5F5] transition-colors">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-sm font-medium text-[#2B2B2B]">{{ $proveedor->nombre }}</h4>
                                    <h4 class="text-sm font-medium text-[#2B2B2B]">{{ $proveedor->nombre_contacto }}</h4>
                                    <p class="text-xs text-[#A1A1A1] mt-1">{{ $proveedor->telefono }}</p>
                                    <p class="text-xs text-[#2B2B2B] mt-1">{{ $proveedor->descripcion }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('proveedores.edit', $proveedor) }}" class="text-[#166534] hover:text-[#0e4a24]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form id="delete-form-mobile{{ $proveedor->id }}" action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $proveedor->id }})" class="text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script para ocultar alertas y confirmación de eliminación -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 5000);
            }
        });
        
        function confirmDelete(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
                document.getElementById('delete-form' + id).submit();
            }
        }
    </script>
</x-app-layout>