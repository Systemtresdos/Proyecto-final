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
            'nombre' => 'Administrador',
            'descripcion' => 'Acceso total al sistema',
        ]);
        Rol::create([
            'nombre' => 'Empleado',
            'descripcion' => 'Acceso limitado al sistema',
        ]);
    }
}
