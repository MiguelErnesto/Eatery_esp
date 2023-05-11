<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Section1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section1s')->truncate();
        DB::table('section1s')->insert([
            [
                'image' => 'slider-image1.jpg',
                'lb_button' => 'Reservación',
                'link_button' => 'footer',
                'small_text' => 'Nuevo restaurante en la ciudad',
                'large_text' =>
                    'Disfruta de nuestros menús especiales todos los domingos y viernes',
            ],
            [
                'image' => 'slider-image2.jpg',
                'lb_button' => 'Descubra el menú',
                'link_button' => 'menu',
                'small_text' => 'Su desayuno perfecto',
                'large_text' => '
                ¡La mejor calidad gastronómica también la puedes encontrar aquí!',
            ],
            [
                'image' => 'slider-image3.jpg',
                'lb_button' => 'Conozca a nuestro cocinero',
                'link_button' => 'Cocinero',
                'small_text' => 'Cafetería y Restaurante',
                'large_text' =>
                    'Nuestra misión es brindar una experiencia inolvidable.',
            ],
        ]);
    }
}
