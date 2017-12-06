<?php

use App\Model\Ingredient;
use App\Model\Receipt;
use Illuminate\Database\Seeder;

class ReceiptsIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for($i=0;$i<50;$i++) {
//            \DB::table('receipt_ingredients')->insert([
//                'ingredient_id' => Ingredient::inRandomOrder()->get()->first()->id,
//                'receipt_id' => Receipt::inRandomOrder()->get()->first()->id,
//            ]);
//        }
    }
}
