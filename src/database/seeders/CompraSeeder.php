<?php

namespace Database\Seeders;

use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compra::create([
            'fecha_compra' => now(),
            'proveedor_id' => 1,
            'total' => 24086,
        ]);
        Compra::create([
            'fecha_compra' => now(),
            'proveedor_id' => 2,
            'total' => 28900,

        ]);
        Compra::create([
            'fecha_compra' => now(),
            'proveedor_id' => 3,
            'total' => 40260,
        ]);
        Compra::create([
            'fecha_compra' => now(),
            'proveedor_id' => 4,
            'total' => 22260,
        ]);
        Compra::create([
            'fecha_compra' => now(),
            'proveedor_id' => 5,
            'total' => 25480,
        ]);
    }
}
