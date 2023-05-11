<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mains')->truncate();
        DB::table('mains')->insert([
            'name1' => 'Eatery',
            'name2' => 'Cafe',
        ]);

        DB::table('front_previews')->truncate();
        DB::table('front_previews')->insert([
            'url' => 'http://localhost:8000/',
        ]);

        DB::table('navbars')->truncate();
        DB::table('navbars')->insert([
            'item1' => 'INICIO',
            'item2' => 'NOSOTROS',
            'item3' => 'COCINEROS',
            'item4' => 'MENU',
            'item5' => 'CONTACTO',
            'item6' => 'LLÁMENOS!',
            'item7' => 'Reserve una mesa',
            'chk1' => '1',
            'chk2' => '1',
            'chk3' => '1',
            'chk4' => '1',
            'chk5' => '1',
            'chk6' => '1',
            'chk7' => '1',
        ]);

        DB::table('footers')->truncate();
        DB::table('footers')->insert([
            'symbol' => 'Copyright ©',
            'year' => '2018',
            'owner' => 'Nombre de su compañía',
            'link' => 'http://www.templatemo.com',
            'name_link' => 'TemplateMo',
            'other_details' => 'Diseñado:',
        ]);

        DB::table('social_networks')->truncate();
        DB::table('social_networks')->insert([
            [
                'name' => 'facebook',
                'image' => 'facebook.png',
                'url' => 'http://www.facebook.com/templatemo',
            ],
            [
                'name' => 'twitter',
                'image' => 'twitter.png',
                'url' => '#',
            ],
            [
                'name' => 'instagram',
                'image' => 'instagram.png',
                'url' => '#',
            ],
            [
                'name' => 'google',
                'image' => 'google.png',
                'url' => '#',
            ],
        ]);
    }
}
