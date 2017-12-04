<?php

namespace App\Model;

use App\Model\Traits\IconTrait;
use App\Models\Values\Icon;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use IconTrait;

    public static $dir = '/assets/img/herb';

    protected $guarded = [];

    public function setIconAttribute($value)
    {
        $this->attributes['icon'] = new Icon($value, self::$dir);
    }

    public function getIconAttribute($value)
    {
        return new Icon($value, self::$dir);
    }

    public function receipts()
    {
        return $this->belongsToMany(Ingredient::class, 'receipt_ingredients');
    }
}
