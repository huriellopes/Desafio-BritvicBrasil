<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'client_id' => 1,
                'car_id' => 1,
                'reserved_at' => Carbon::now()->setDay((string) Carbon::now())
            ],
            [
                'client_id' => 2,
                'car_id' => 2,
                'reserved_at' => Carbon::now()->setDay((string) Carbon::now())
            ],
            [
                'client_id' => 3,
                'car_id' => 3,
                'reserved_at' => Carbon::now()->setDay((string) Carbon::now())
            ],
            [
                'client_id' => 4,
                'car_id' => 4,
                'reserved_at' => Carbon::now()->setDay((string) Carbon::now())
            ],
            [
                'client_id' => 5,
                'car_id' => 5,
                'reserved_at' => Carbon::now()->setDay((string) Carbon::now())
            ],
        ]);
    }
}
