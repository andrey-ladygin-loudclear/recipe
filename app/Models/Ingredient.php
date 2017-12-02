<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public static $dir = '/assets/img/herb';

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
