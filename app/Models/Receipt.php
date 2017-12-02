<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
