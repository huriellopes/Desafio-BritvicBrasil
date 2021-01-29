<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'Nicolas Isaac Vitor Araújo',
                'cpf' => Str::random(11),
                'user_id' => 1
            ],
            [
                'name' => 'Pietro Theo Fábio Cavalcanti',
                'cpf' => Str::random(11),
                'user_id' => 2
            ],
            [
                'name' => 'Lorenzo Antonio Gustavo Dias',
                'cpf' => Str::random(11),
                'user_id' => 3
            ],
            [
                'name' => 'Carlos Eduardo Daniel da Conceição',
                'cpf' => Str::random(11),
                'user_id' => 4
            ],
            [
                'name' => 'Benedito Osvaldo Theo da Mota',
                'cpf' => Str::random(11),
                'user_id' => 5
            ],
        ]);
    }
}
