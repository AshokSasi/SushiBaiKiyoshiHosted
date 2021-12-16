<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function fish()
    {
        return $this->hasOne('App\FishStock');
    }
}
