<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Model\Ingredient;
use App\Model\Receipt;
use Illuminate\Http\Request;
use Mews\Purifier\Purifier;

class Receipts extends Controller
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
        $receipts = auth()->user()->receipts()->latest()->get() ?? [];
        return view('back.receipts.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.receipts.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receipt = Receipt::updateOrCreate(
            ['id' => request('id')],
            [
            'user_id' => auth()->id(),
            'name' => request('name'),
            'icon' => request('icon'),
            'author' => request('author') ?? '',
            'description' => clean(request('description')),
        ]);

        $receipt->ingredients()->detach();

        foreach((array)$request->get('ingredients') as $ingredient)
        {
            $receipt->ingredients()->sync([
                $ingredient['id'] => [
                    'quantity' => $ingredient['quantity'],
                    'measure' => $ingredient['measure'],
                ]
            ], false);
        }

        //return redirect("admin/receipts/{$receipt->id}/edit");
        return redirect("admin/receipts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        return view('back.receipts.edit', ['receipt' => $receipt]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
