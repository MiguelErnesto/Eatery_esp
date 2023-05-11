<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Section2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section2s')->truncate();
        DB::table('section2s')->insert([
            'small_text' => 'LEA NUESTRA HISTORIA',
            'large_text' => "
            Hemos estado elaborando deliciosos alimentos desde 1999",
            'description' =>
                'Fusce hendrerit malesuada lacinia. Donec semper semper sem vitae malesuada. Proin scelerisque risus et ipsum semper molestie sed in nisi. Ut rhoncus congue lectus, rhoncus venenatis leo malesuada id. Sed elementum vel felis sed scelerisque. In arcu diam, sollicitudin eu nibh ac, posuere tristique magna. You can use this template for your cafe or restaurant website. Please tell your friends about templatemo. Thank you.',
            'image' => 'about-image.jpg',
        ]);
    }
}
