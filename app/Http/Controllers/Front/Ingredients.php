<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
use Illuminate\Http\Request;

class Ingredients extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     * @internal param Receipt $receipt
     * @internal param int $id
     */
    public function show(Ingredient $ingredient)
    {
        return view('front.ingredients.show', compact('ingredient'));
    }
}
