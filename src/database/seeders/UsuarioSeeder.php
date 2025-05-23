<?php

namespace Database\Seeders;

use App\Models\Encargado;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nombre' => 'Ditmar',
            'telefono' => '00000000',
            'direccion' => 'Av. Siempre Viva 123',
            'correo' => 'ditmar@gmail.com',
            'password' => '123456789',
            'rol_id' => 1,  
        ]);
        Encargado::create([
            'dni' => '01010101',
            'usuario_id' => 1,
        ]);
    
    }
}
