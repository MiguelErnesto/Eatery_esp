<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Section3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section3s')->truncate();
        DB::table('section3s')->insert([
            'title' => 'Conoce a nuestras cocineras',
            'description' => 'Ellas son agradables y amistosas',
        ]);

        DB::table('section3_imgs')->truncate();
        DB::table('section3_imgs')->insert([
            [
                'image' => 'team-image1.jpg',
                'name' => 'New Catherine',
                'role' => 'Oficial de cocina',
                'text_social_networks' =>
                    'Duis vel lacus id magna mattis vehicula',
            ],
            [
                'image' => 'team-image2.jpg',
                'name' => 'Lindsay Perlen',
                'role' => 'Propietaria y Gerente',
                'text_social_networks' =>
                    'Cras suscipit neque quis odio feugiat',
            ],
            [
                'image' => 'team-image3.jpg',
                'name' => 'Isabella Grace',
                'role' => 'Especialista en pizzas',
                'text_social_networks' =>
                    'Etiam auctor enim tristique faucibus',
            ],
        ]);

        DB::table('section3_imgs_social_networks')->truncate();
        DB::table('section3_imgs_social_networks')->insert([
            // First Image
            [
                'section3_imgs_id' => '1',
                'name' => 'linkedin',
                'image' => 'linkedin.png',
                'link' => 'http://www.linkedin.com',
            ],
            [
                'section3_imgs_id' => '1',
                'name' => 'google',
                'image' => 'google.png',
                'link' => 'http://www.google.com',
            ],

            // Second Image
            [
                'section3_imgs_id' => '2',
                'name' => 'instagram',
                'image' => 'instagram.png',
                'link' => 'http://www.instagram.com',
            ],
            [
                'section3_imgs_id' => '2',
                'name' => 'flickr',
                'image' => 'flickr.png',
                'link' => 'http://www.flickr.com',
            ],

            // Third Image
            [
                'section3_imgs_id' => '3',
                'name' => 'github',
                'image' => 'github.png',
                'link' => 'http://www.github.com',
            ],
            [
                'section3_imgs_id' => '3',
                'name' => 'google',
                'image' => 'google.png',
                'link' => 'http://www.google.com',
            ],
        ]);
    }
}
