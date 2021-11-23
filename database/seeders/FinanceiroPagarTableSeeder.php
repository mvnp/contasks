<?php

namespace Database\Seeders;

use App\Models\FinanceiroPagar;
use Illuminate\Database\Seeder;

class FinanceiroPagarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FinanceiroPagar::factory()->count(5000)->create();
    }
}
