<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
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
}
