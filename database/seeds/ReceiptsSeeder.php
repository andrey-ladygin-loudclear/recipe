<?php

use Illuminate\Database\Seeder;

class ReceiptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Receipt::class, 50)->create();
    }
}
