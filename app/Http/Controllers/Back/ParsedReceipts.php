<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
use App\Models\ParsedRecipes;
use Illuminate\Http\Request;
use Mews\Purifier\Purifier;
use Storage;

class ParsedReceipts extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = ParsedRecipes::where('checked', '=', 0)->take(50)->get();
        return view('back.parsed_receipts.index', compact('receipts'));
    }
}
