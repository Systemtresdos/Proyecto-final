<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="apellido_p" :value="__('Apellido Paterno')" />
            <x-text-input id="apellido_p" class="block mt-1 w-full" type="text" name="apellido_p" :value="old('apellido_p')" required autofocus autocomplete="apellido_p" />
            <x-input-error :messages="$errors->get('apellido_p')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="apellido_m" :value="__('Apellido Materno')" />
            <x-text-input id="apellido_m" class="block mt-1 w-full" type="text" name="apellido_m" :value="old('apellido_m')" required autofocus autocomplete="apellido_m" />
            <x-input-error :messages="$errors->get('apellido_m')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="ci" :value="__('N° De carnet')" />
            <x-text-input id="ci" class="block mt-1 w-full" type="text" name="ci" :value="old('ci')" required autofocus autocomplete="ci" />
            <x-input-error :messages="$errors->get('ci')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="usuario" :value="__('Usuario')" />
            <x-text-input id="usuario" class="block mt-1 w-full" type="text" name="usuario" :value="old('usuario')" required autocomplete="user" />
            <x-input-error :messages="$errors->get('usuario')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="rol_id" :value="__('Rol')" />
            <select id="rol_id" name="rol_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Seleccione un rol</option>
                @foreach($rols as $rol)
                    <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach 
            </select>
            <x-input-error :messages="$errors->get('rol_id')" class="mt-2" />
        </div> 

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        document.getElementById('telefono').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        document.getElementById('ci').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</x-guest-layout>
