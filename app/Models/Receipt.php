<?php

namespace App\Model;

use App\Models\Values\Icon;
use App\Model\Traits\IconTrait;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use IconTrait;

    public static $dir = '/assets/img/receipts';

    protected $guarded = [];

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = new Icon($value, self::$dir);
    }
    public function getIconAttribute($value)
    {
        return new Icon($value, self::$dir);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'receipt_ingredients');
    }
}
