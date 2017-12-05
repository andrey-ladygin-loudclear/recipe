<?php

use App\Helpers\IconHelper;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = json_decode(file_get_contents('database/seeds/data/ingredients.json'));
        foreach($ingredients as $ingredient)
        {
            \App\Model\Ingredient::create([
                'name' => $ingredient
            ]);
        }
    }
}
