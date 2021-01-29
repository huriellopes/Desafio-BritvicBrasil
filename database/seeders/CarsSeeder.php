<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'car_model' => 'Mercedes',
                'year' => '2020',
                'vehicle_plate' => 'JJZ5054',
                'user_id' => 1
            ],

            [
                'car_model' => 'BMW',
                'year' => '2019',
                'vehicle_plate' => 'JJV3008',
                'user_id' => 2
            ],

            [
                'car_model' => 'Hyunday',
                'year' => '2011',
                'vehicle_plate' => 'JES3965',
                'user_id' => 3
            ],

            [
                'car_model' => 'Honda',
                'year' => '2010',
                'vehicle_plate' => 'JKR3751',
                'user_id' => 4
            ],
            [
                'car_model' => 'Civc',
                'year' => '2008',
                'vehicle_plate' => 'JGI9949',
                'user_id' => 5
            ],
        ]);
    }
}
