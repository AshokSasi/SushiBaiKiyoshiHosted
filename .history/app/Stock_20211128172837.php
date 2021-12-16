<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function FishStock()
    {
        return $this->hasOne(FishStock::class);
    }
}
