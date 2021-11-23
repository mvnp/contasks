<?php

namespace Database\Seeders;

use App\Models\ConfigAtividades;
use Illuminate\Database\Seeder;

class ConfigAtividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigAtividades::factory()->count(300)->create();
    }
}
