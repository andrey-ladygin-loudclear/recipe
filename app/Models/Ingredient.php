<?php

namespace App\Model;

use App\Model\Traits\IconTrait;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use IconTrait;

    public static $dir = '/assets/img/herb';

    protected $guarded = [];

    public function receipts()
    {
        return $this->belongsToMany(Ingredient::class, 'receipt_ingredients');
    }
}
