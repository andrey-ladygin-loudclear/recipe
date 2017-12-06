<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Auth;

class Purchases extends Controller
{
    public function index()
    {
        $purchases = Purchases::where('user_id', '=', Auth::id())->get();

        return view('back.purchases.index', compact('purchases'));
    }
}
