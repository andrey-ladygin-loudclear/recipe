<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;

class Dashboard extends Controller {
    public function index()
    {
//        $receipts = Receipt::all();
        $receipts = Ingredient::all();
        return view('front.dashboard', compact('receipts'));
    }
}