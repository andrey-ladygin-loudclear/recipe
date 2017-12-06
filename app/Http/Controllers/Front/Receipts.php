<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
use App\Models\Purchases;
use Illuminate\Http\Request;

class Receipts extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Receipt $receipt
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Receipt $receipt)
    {
        return view('front.receipts.show', compact('receipt'));
    }

    public function purchases(Receipt $receipt)
    {
        dd($receipt);
        foreach($receipt->ingredients() as $ingredient)
        {
            Purchases::create([
                'user_id' => auth()->id(),

            ]);
        }
    }
}
