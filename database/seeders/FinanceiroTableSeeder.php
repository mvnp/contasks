<?php

namespace Database\Seeders;

use App\Models\Financeiro;
use Illuminate\Database\Seeder;

class FinanceiroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Financeiro::factory()->count(5000)->create();
    }
}
