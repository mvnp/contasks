<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserTableSeeder::class,
            // ConfigAtividadesTableSeeder::class,
            // ConfigSetoresTableSeeder::class,
            // ConfigTarefasTableSeeder::class,
            EmpresasTableSeeder::class
        ]);
    }
}
