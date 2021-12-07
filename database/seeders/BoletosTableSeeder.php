<?php

namespace Database\Seeders;

use App\Models\Boletos;
use Illuminate\Database\Seeder;

class BoletosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Boletos::factory()->count(100)->create();
    }
}
