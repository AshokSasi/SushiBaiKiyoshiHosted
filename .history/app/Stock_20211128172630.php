<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function fishStock()
    {
        return $this->hasOne(FishStock::class);
    }
}
