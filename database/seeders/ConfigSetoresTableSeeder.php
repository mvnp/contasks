<?php

namespace Database\Seeders;

use App\Models\ConfigSetores;
use Illuminate\Database\Seeder;

class ConfigSetoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigSetores::factory()->count(30)->create();
    }
}
