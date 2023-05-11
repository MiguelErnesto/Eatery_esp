<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('reservations')->truncate();
        DB::table('reservations')->insert([
            'name' => 'Admin',
            'email' => 'admin@website.com',
            'date' => date('Y-m-d'),
            'time' => date('H:i'),
            'quantity' => 4,
        ]); */
    }
}
