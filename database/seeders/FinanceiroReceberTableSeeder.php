<?php

namespace Database\Seeders;

use App\Models\FinanceiroReceber;
use Illuminate\Database\Seeder;

class FinanceiroReceberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FinanceiroReceber::factory()->count(15000)->create();
    }
}
