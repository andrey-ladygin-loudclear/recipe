<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(ReceiptsSeeder::class);
        $this->call(ReceiptsIngredientsSeeder::class);
    }
}
