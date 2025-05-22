<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Ditmar',
            'apellido_p' => 'Rojas',
            'apellido_m' => 'Canelas',
            'ci' => '12345678',
            'telefono' => '123456789',
            'usuario' => 'ditmar',
            'password' => '123456789',
            'rol_id' => 1,  
        ]);
        User::create([
            'nombre' => 'Arleth',
            'apellido_p' => 'Ricaldez',
            'apellido_m' => 'Tapia',
            'ci' => '87654321',
            'telefono' => '987654321',
            'usuario' => 'arleth',
            'password' => '123456789',
            'rol_id' => 2,  
        ]);
    
    }
}
