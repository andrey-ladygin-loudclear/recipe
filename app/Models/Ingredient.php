<?php

namespace App\Model;

use App\Model\Traits\IconTrait;
use App\Models\Values\Icon;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use IconTrait;

    protected $guarded = [];

    public function receipts()
    {
        return $this->belongsToMany(Ingredient::class, 'receipt_ingredients');
    }
}
