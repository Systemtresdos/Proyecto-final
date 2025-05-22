<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'nombre' => 'SilverCraft Jewelry',
            'nombre_contacto' => 'María López',
            'telefono' => '+34 600 123 456',
            'descripcion' => 'Proveedor especializado en plata esterlina y charms personalizados'
        ]);
        Proveedor::create([
            'nombre' => 'GoldMaster Inc.',
            'nombre_contacto' => 'Carlos Mendoza',
            'telefono' => '+34 910 789 123',
            'descripcion' => 'Fabricante de joyería en oro de 18k y diseños exclusivos'
        ]);
        Proveedor::create([
            'nombre' => 'Gemstone World',
            'nombre_contacto' => 'Laura Fernández',
            'telefono' => '+34 620 456 789',
            'descripcion' => 'Distribuidor de piedras preciosas y diamantes para joyería fina'
        ]);
        Proveedor::create([
            'nombre' => 'Luxury Timepieces',
            'nombre_contacto' => 'Ana Torres',
            'telefono' => '+34 650 321 654',
            'descripcion' => 'Importador de joyas de lujo y accesorios premium'
        ]);
        Proveedor::create([
            'nombre' => 'CrystalShine',
            'nombre_contacto' => 'David Martínez',
            'telefono' => '+34 690 852 741',
            'descripcion' => 'Proveedor de cristales Swarovski y componentes brillantes para joyería'
        ]);
    }
}
