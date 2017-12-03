<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class Tinymce extends Controller
{
    public function upload(Request $request)
    {
//        Storage::disk('local')->put('mcefiles', $request->get('file'));
        $path  = $request->file('file')->store('public/mcefiles');
        return response([
            'location' => Storage::url($path),
        ]);
    }
}
