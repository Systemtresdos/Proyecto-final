<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // anillos
        Producto::create([
            'nombre' => 'Anillo Estrellas Fugaces Dorado',
            'codigo' => 'AN001',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Anillo_Abierto_Estrellas_Fugaces_Dorado.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Banda Cruzada Lazo Brillante',
            'codigo' => 'AN002',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Anillo_Banda_Cruzada_Lazo_Brillante.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Corazón Doble Banda Plata',
            'codigo' => 'AN003',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Anillo_Corazón_Doble_Banda_Plata.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Bandas Entrelazadas en Dos Tonos',
            'codigo' => 'AN004',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Anillo_Bandas_Entrelazadas_en_Dos_Tonos.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Canal Eternity',
            'codigo' => 'AN005',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/Anillo_Canal_Eternity.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Corazón Forma Orgánica Plateado',
            'codigo' => 'AN006',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/Anillo_Corazón_Forma_Orgánica_Plateado.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Corazón Ondulado',
            'codigo' => 'AN007',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/Anillo_Corazón_Ondulado.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Corazón Ondulado en Pavé',
            'codigo' => 'AN008',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/Anillo_Corazón_Ondulado_en_Pavé.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Corazón Rosa Elevado',
            'codigo' => 'AN009',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Anillo_Corazón_Rosa_Elevado.png',
            'categoria_id' => '4',
        ]);
        Producto::create([
            'nombre' => 'Anillo Cocktail Cuadrado en Pavé',
            'codigo' => 'AN0010',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Anillo_de_Cocktail_Cuadrado_en_Pavé.png',
            'categoria_id' => '4',
        ]);

        //pendientes
        Producto::create([
            'nombre' => 'Aretes Círculo Forma Orgánica y Perla de Agua Dulce',
            'codigo' => 'PE001',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Aretes-Círculo-Forma-Orgánica-y-Perla-Cultivada-de-Agua-Dulce-Tratada-Barroca.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Abierto de 42mm Forma Orgánica',
            'codigo' => 'PE002',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Abierto-de-42-mm-Forma-Orgánica.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Abierto Forma Orgánica',
            'codigo' => 'PE003',
            'stock' => '20',
            'precio_venta' => '250',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Abierto-Forma-Orgánica.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Abierto Forma Orgánica en V Plata',
            'codigo' => 'PE004',
            'stock' => '20',
            'precio_venta' => '250',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Abierto-Forma-Orgánica-en-V-Plata.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Abierto de 42mm Forma Orgánica',
            'codigo' => 'PE005',
            'stock' => '20',
            'precio_venta' => '220',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Abiertos-de-42-mm-Forma-Orgánica.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Corazón Asimétrico Dorado',
            'codigo' => 'PE006',
            'stock' => '20',
            'precio_venta' => '220',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Corazón-Asimétrico-Dorado.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Corazón Brillante',
            'codigo' => 'PE007',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Corazón-Brillante.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Corazones Brillantes',
            'codigo' => 'PE008',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Corazones-Brillantes.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro Corazón Forma Orgánica',
            'codigo' => 'PE009',
            'stock' => '20',
            'precio_venta' => '105',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-Corazón-Forma-Orgánica.png',
            'categoria_id' => '5',
        ]);
        Producto::create([
            'nombre' => 'Aretes Aro de 18mm Pandora Moments',
            'codigo' => 'PE010',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/Aretes-de-Aro-de-18-mm-Pandora-Moments-para-Charms.png',
            'categoria_id' => '5',
        ]);

        //pulceras
        Producto::create([
            'nombre' => 'Brazalete Cadena de Serpiente con Cierre Redondo Pandora Moments',
            'codigo' => 'BR001',
            'stock' => '20',
            'precio_venta' => '300',
            'imagen' => 'storage/imagenes/Brazalete-Cadena-de-Serpiente-con-Cierre-Redondo-Pandora-Moments.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Cadena de Serpiente Pandora Moments Plata',
            'codigo' => 'BR002',
            'stock' => '20',
            'precio_venta' => '300',
            'imagen' => 'storage/imagenes/Brazalete-Cadena-de-Serpiente-Pandora-Moments-Plata.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Cadena de Serpiente Trenzada con Cierre de Bola de Pandora',
            'codigo' => 'BR003',
            'stock' => '20',
            'precio_venta' => '350',
            'imagen' => 'storage/imagenes/Brazalete-Cadena-de-Serpiente-Trenzada-con-Cierre-de-Bola-de-Pandora.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Cadena de Serpiente con Cierre de Corazón de Pandora Moments',
            'codigo' => 'BR004',
            'stock' => '20',
            'precio_venta' => '350',
            'imagen' => 'storage/imagenes/Brazalete-de-Cadena-de-Serpiente-con-Cierre-de-Corazón-de-Pandora-Moments.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Cadena de Serpiente con Cierre de Corazón Infinito Brillante',
            'codigo' => 'BR005',
            'stock' => '20',
            'precio_venta' => '320',
            'imagen' => 'storage/imagenes/Brazalete-de-Cadena-de-Serpiente-con-Cierre-de-Corazón-Infinito-Brillante.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete de Cadena Estación Perlas Cultivadas de Agua Dulce Tratadas',
            'codigo' => 'BR006',
            'stock' => '20',
            'precio_venta' => '320',
            'imagen' => 'storage/imagenes/Brazalete-de-Cadena-Estación-Perlas-Cultivadas-de-Agua-Dulce-Tratadas.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Diseño Cola de Ratón con Cierre de Barril Moments Pandora',
            'codigo' => 'BR007',
            'stock' => '20',
            'precio_venta' => '300',
            'imagen' => 'storage/imagenes/Brazalete-Diseño-Cola-de-Ratón-con-Cierre-de-Barril-Moments-Pandora.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Estrellas Celestiales',
            'codigo' => 'BR008',
            'stock' => '20',
            'precio_venta' => '350',
            'imagen' => 'storage/imagenes/Brazalete-Estrellas-Celestiales.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Moments Grabable Diseño Cadena de Serpiente con cierre de Corazón Plateado',
            'codigo' => 'BR009',
            'stock' => '20',
            'precio_venta' => '130',
            'imagen' => 'storage/imagenes/Brazalete-Moments-Grabable-Diseño-Cadena-de-Serpiente-con-cierre-de-Corazón-Plateado.png',
            'categoria_id' => '1',
        ]);
        Producto::create([
            'nombre' => 'Brazalete Pandora ME Eslabones Link',
            'codigo' => 'BR010',
            'stock' => '20',
            'precio_venta' => '130',
            'imagen' => 'storage/imagenes/Brazalete-Pandora-ME-Eslabones-Link.png',
            'categoria_id' => '1',
        ]);

        //charms
        Producto::create([
            'nombre' => 'Charm Corazon Rosa Pla',
            'codigo' => 'CH001',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Charm_Coraz-C3-B3n_Met-C3-A1lico_Rosa_1.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Clip Esmalte Y Gemas Blanco',
            'codigo' => 'CH002',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/clip_esmalte_y_gemas_blanco.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Birrete Graduacion',
            'codigo' => 'CH003',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/colgante_birrete_graduacion.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Cupido',
            'codigo' => 'CH004',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/colgante_cupido.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Divisible Madre e Hija',
            'codigo' => 'CH005',
            'stock' => '20',
            'precio_venta' => '160',
            'imagen' => 'storage/imagenes/colgante_divisible_madre_e_hija.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Divisible Sol y Luna',
            'codigo' => 'CH006',
            'stock' => '20',
            'precio_venta' => '160',
            'imagen' => 'storage/imagenes/colgante_divisible_sol_y_luna.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Doble Carroza y Corazon Cenicienta',
            'codigo' => 'CH007',
            'stock' => '20',
            'precio_venta' => '160',
            'imagen' => 'storage/imagenes/colgante_doble_carroza_y_corazon_cenicienta.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Doble Colibri',
            'codigo' => 'CH008',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/colgante_doble_colibri.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Doble Corazon',
            'codigo' => 'CH009',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/colgante_doble_corazon.png',
            'categoria_id' => '2',
        ]);
        Producto::create([
            'nombre' => 'Charm Colgante Doble Libelula',
            'codigo' => 'CH010',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/colgante_doble_libelula.png',
            'categoria_id' => '2',
        ]);

        //collares
        Producto::create([
            'nombre' => 'Collar Choker de Tenis',
            'codigo' => 'CO001',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Choker-de-Tenis.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Choker Halo Corazón',
            'codigo' => 'CO002',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Choker-Halo-Corazón.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Amando el Halo',
            'codigo' => 'CO003',
            'stock' => '20',
            'precio_venta' => '140',
            'imagen' => 'storage/imagenes/Collar-Amando-el-Halo.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Barra en T Círculos Forma Orgánica',
            'codigo' => 'CO004',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Collar-Barra-en-T-Círculos-Forma-Orgánica.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Cadena de Cable Dorado',
            'codigo' => 'CO005',
            'stock' => '20',
            'precio_venta' => '200',
            'imagen' => 'storage/imagenes/Collar-Cadena-de-Cable-Dorado.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Círculo Forma Orgánica en Pavé y Perla Cultivada de Agua Dulce Oro',
            'codigo' => 'CO006',
            'stock' => '20',
            'precio_venta' => '180',
            'imagen' => 'storage/imagenes/Collar-Círculo-Forma-Orgánica-en-Pavé-y-Perla-Cultivada-de-Agua-Dulce-Oro.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Círculo Forma Orgánica en Pavé y Perla Cultivada de Agua Dulce Plata',
            'codigo' => 'CO007',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/Collar-Círculo-Forma-Orgánica-en-Pavé-y-Perla-Cultivada-de-Agua-Dulce-Plata.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Corazón Elevado',
            'codigo' => 'CO008',
            'stock' => '20',
            'precio_venta' => '220',
            'imagen' => 'storage/imagenes/Collar-Corazón-Elevado.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Corazones Unidos Plata',
            'codigo' => 'CO009',
            'stock' => '20',
            'precio_venta' => '220',
            'imagen' => 'storage/imagenes/Collar-Corazones-Unidos-Plata.png',
            'categoria_id' => '3',
        ]);
        Producto::create([
            'nombre' => 'Collar Corazón Forma Orgánica Oro',
            'codigo' => 'CO010',
            'stock' => '20',
            'precio_venta' => '150',
            'imagen' => 'storage/imagenes/Collar-Corazón-Forma-Orgánica-Oro.png',
            'categoria_id' => '3',

        ]);
    }
}
