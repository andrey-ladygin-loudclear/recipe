<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
use App\Model\User;

class Dashboard extends Controller {
    public function index()
    {
        $receipts = Receipt::all();
        return view('front.dashboard', compact('receipts'));
    }
}