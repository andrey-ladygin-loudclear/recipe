<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $guarded = [];

    public function buy()
    {
        $this->bought = true;
        $this->save();
    }

    public function addToPurchases()
    {
        $this->bought = false;
        $this->save();
    }
}
