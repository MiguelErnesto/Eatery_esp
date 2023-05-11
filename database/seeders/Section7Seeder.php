<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class Section7Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section7s')->truncate();
        DB::table('section7s')->insert([
            'fu_description' =>
                '123 nulla a cursus rhoncus,augue sem viverra 10870 id ultricies sapien',

            // Reservation
            'rv_number1' => '090-080-0650',
            'rv_number2' => '090-070-0430',
            'rv_email' => 'info@company.com',
            'rv_text' => 'LINE: eatery247',

            // Open Hours
            'oh_closed' => 'Lunes',
            'oh_days1' => 'Martes a Viernes',
            'oh_hours1' => '7:00 AM - 9:00 PM',
            'oh_days2' => 'Sábado - Domingo',
            'oh_hours2' => '11:00 AM - 10:00 PM',
            'oh_bg_image' => 'footer-open-hour-bg.jpg',
        ]);
    }
}
