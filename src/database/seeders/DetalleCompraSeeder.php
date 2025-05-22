<?php

namespace Database\Seeders;

use App\Models\DetalleCompra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //anillos
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 1,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 2,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 3,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 4,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 5,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 6,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 7,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 8,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 9,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 1,
            'producto_id' => 10,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2526,
        ]);

        //pendientes
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 11,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 12,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 13,
            'cantidad' => 20,
            'precio_unitario' => 175,
            'sub_total' => 3500,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 14,
            'cantidad' => 20,
            'precio_unitario' => 175,
            'sub_total' => 3500,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 15,
            'cantidad' => 20,
            'precio_unitario' => 154,
            'sub_total' => 3080,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 16,
            'cantidad' => 20,
            'precio_unitario' => 154,
            'sub_total' => 3080,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 17,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 18,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 19,
            'cantidad' => 20,
            'precio_unitario' => 150,
            'sub_total' => 3000,
        ]);
        DetalleCompra::create([
            'compra_id' => 2,
            'producto_id' => 20,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);

        //pulseras
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 21,
            'cantidad' => 20,
            'precio_unitario' => 210,
            'sub_total' => 4200,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 22,
            'cantidad' => 20,
            'precio_unitario' => 210,
            'sub_total' => 4200,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 23,
            'cantidad' => 20,
            'precio_unitario' => 245,
            'sub_total' => 4900,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 24,
            'cantidad' => 20,
            'precio_unitario' => 245,
            'sub_total' => 4900,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 25,
            'cantidad' => 20,
            'precio_unitario' => 224,
            'sub_total' => 4480,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 26,
            'cantidad' => 20,
            'precio_unitario' => 224,
            'sub_total' => 4480,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 27,
            'cantidad' => 20,
            'precio_unitario' => 210,
            'sub_total' => 4200,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 28,
            'cantidad' => 20,
            'precio_unitario' => 245,
            'sub_total' => 4900,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 29,
            'cantidad' => 20,
            'precio_unitario' => 100,
            'sub_total' => 2000,
        ]);
        DetalleCompra::create([
            'compra_id' => 3,
            'producto_id' => 30,
            'cantidad' => 20,
            'precio_unitario' => 100,
            'sub_total' => 2000,
        ]);

        //charms
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 31,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 32,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 33,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 34,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 35,
            'cantidad' => 20,
            'precio_unitario' => 112,
            'sub_total' => 2240,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 36,
            'cantidad' => 20,
            'precio_unitario' => 112,
            'sub_total' => 2240,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 37,
            'cantidad' => 20,
            'precio_unitario' => 112,
            'sub_total' => 2240,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 38,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 39,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 4,
            'producto_id' => 40,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);

        //collares
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 41,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 42,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 43,
            'cantidad' => 20,
            'precio_unitario' => 98,
            'sub_total' => 1960,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 44,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 45,
            'cantidad' => 20,
            'precio_unitario' => 140,
            'sub_total' => 2800,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 46,
            'cantidad' => 20,
            'precio_unitario' => 126,
            'sub_total' => 2520,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 47,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 48,
            'cantidad' => 20,
            'precio_unitario' => 154,
            'sub_total' => 3080,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 49,
            'cantidad' => 20,
            'precio_unitario' => 154,
            'sub_total' => 3080,
        ]);
        DetalleCompra::create([
            'compra_id' => 5,
            'producto_id' => 50,
            'cantidad' => 20,
            'precio_unitario' => 105,
            'sub_total' => 2100,
        ]);
    }
}
