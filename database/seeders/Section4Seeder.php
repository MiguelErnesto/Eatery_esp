<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Section4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section4s')->truncate();
        DB::table('section4s')->insert([
            'title' => 'Nuestro Menú',
            'description' => 'HORA DEL TÉ Y CENA',
            'bg_testimonials_image' => 'testimonial-bg.jpg',
        ]);

        DB::table('section4_images')->truncate();
        DB::table('section4_images')->insert([
            [
                'image' => 'menu-image1.jpg',
                'title' => 'Desayuno Americano',
                'description' => 'Tomate / Huevos / Salchicha',
                'text_popup' => 'Desayuno Americano',
                'price' => '25',
            ],
            [
                'image' => 'menu-image2.jpg',
                'title' => 'Ensalada casera',
                'description' => 'Verduras / Frutas / Saludable',
                'text_popup' => 'Ensalada casera',
                'price' => '18',
            ],
            [
                'image' => 'menu-image3.jpg',
                'title' => 'Fideos chinos',
                'description' => 'Pimiento / Pollo / Verduras',
                'text_popup' => 'Fideos chinos',
                'price' => '34',
            ],
            [
                'image' => 'menu-image4.jpg',
                'title' => 'Sopa de arroz',
                'description' => 'Verduras / Pollo',
                'text_popup' => 'Sopa de arroz',
                'price' => '28',
            ],
            [
                'image' => 'menu-image5.jpg',
                'title' => 'Hamburguesa Deli',
                'description' => 'description',
                'text_popup' => 'Ternera / Patatas Fritas',
                'price' => '46',
            ],
            [
                'image' => 'menu-image6.jpg',
                'title' => 'Gran plato frito',
                'description' => 'Pimienta / Crujiente',
                'text_popup' => 'Gran plato frito',
                'price' => '38',
            ],
        ]);

        DB::table('section4_testimonials')->truncate();
        DB::table('section4_testimonials')->insert([
            [
                'testimonial_text' => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus
                mollis interdum ullamcorper nulla non.',
                'name' => 'Digital Carlson',
                'name_description' => 'Pharetra quam sit amet',
            ],
            [
                'testimonial_text' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                egestas. Sed vestibulum orci quam.',
                'name' => 'Johnny Stephen',
                'name_description' => 'Magna nisi porta ligula',
            ],
            [
                'testimonial_text' => 'Vivamus aliquet felis eu diam ultricies congue. Morbi porta lorem nec consectetur porta
                quis dui elit habitant morbi.',
                'name' => 'Jessie White',
                'name_description' => 'Vitae lacinia augue urna quis',
            ],
        ]);
    }
}
