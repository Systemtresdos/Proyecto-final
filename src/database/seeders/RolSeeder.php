<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'nombre' => 'Cajero',
            'descripcion' => 'Acceso total al sistema',
        ]);
        Rol::create([
            'nombre' => 'Cocinero',
            'descripcion' => 'Acceso limitado al sistema',
        ]);
        Rol::create([
            'nombre' => 'Mesero',
            'descripcion' => 'Acceso limitado al sistema',
        ]);
    }
}
