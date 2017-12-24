<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Purchases extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $purchases = \App\Models\Purchases::where('user_id', auth()->user()->id)
            ->orderBy('ingredient')
            ->get();

        return view('front.purchases.list', compact('purchases'));
    }

    public function add()
    {

    }

    public function buy(\App\Models\Purchases $purchase)
    {
        $purchase->buy();
        return redirect()->back();
    }

    public function addToPurchases(\App\Models\Purchases $purchase)
    {
        $purchase->addToPurchases();
        return redirect()->back();
    }

    public function clear()
    {
        \App\Models\Purchases::where('user_id', auth()->user()->id)->delete();
        return redirect()->back();
    }
}
