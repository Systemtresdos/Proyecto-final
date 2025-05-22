<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Pulseras',
            'descripcion' => 'Pulceras de plata y oro para personalizar con charms'
        ]);
        Categoria::create([
            'nombre' => 'Charms',
            'descripcion' => 'Dijes y charms para personalizar tus pulseras y collares'
        ]);
        Categoria::create([
            'nombre' => 'Collares',
            'descripcion' => 'Collares y gargantillas de diferentes estilos'
        ]);
        Categoria::create([
            'nombre' => 'Anillos',
            'descripcion' => 'Anillos de plata, oro y con piedras preciosas'
        ]);
        Categoria::create([
            'nombre' => 'Pendientes',
            'descripcion' => 'Aros, pendientes y zarcillos de diversos diseños'
        ]);

        /* $categorias = [
            [
                'nombre' => 'Pulseras',
                'descripcion' => 'Pulseras de plata y oro para personalizar con charms'
            ],
            [
                'nombre' => 'Charms',
                'descripcion' => 'Dijes y charms para personalizar tus pulseras y collares'
            ],
            [
                'nombre' => 'Collares',
                'descripcion' => 'Collares y gargantillas de diferentes estilos'
            ],
            [
                'nombre' => 'Anillos',
                'descripcion' => 'Anillos de plata, oro y con piedras preciosas'
            ],
            [
                'nombre' => 'Pendientes',
                'descripcion' => 'Aros, pendientes y zarcillos de diversos diseños'
            ],
            [
                'nombre' => 'Relojes',
                'descripcion' => 'Relojes de pulsera con estilo elegante'
            ],
            [
                'nombre' => 'Colecciones especiales',
                'descripcion' => 'Ediciones limitadas y colecciones temáticas'
            ],
            [
                'nombre' => 'Regalos',
                'descripcion' => 'Sets y opciones especiales para regalar'
            ],
            [
                'nombre' => 'Novedades',
                'descripcion' => 'Nuestras últimas incorporaciones y tendencias'
            ],
            [
                'nombre' => 'Ofertas',
                'descripcion' => 'Productos con descuentos especiales'
            ]
        ];
    
        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        } */
    }
}
