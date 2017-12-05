<?php

namespace App\Model;

use App\Models\Values\Icon;
use App\Model\Traits\IconTrait;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use IconTrait;

    protected $guarded = [];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'receipt_ingredients')->withPivot(['quantity', 'measure']);
    }
}
