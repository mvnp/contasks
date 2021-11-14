<?php

namespace Database\Seeders;

use App\Models\Empresas;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::factory()->count(25)->create();
    }
}
