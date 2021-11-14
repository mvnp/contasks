<?php

namespace Database\Seeders;

use App\Models\ConfigTarefas;
use Illuminate\Database\Seeder;

class ConfigTarefasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigTarefas::factory()->count(25)->create();
    }
}
