<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $primaryKey = 'stockId';
    public function fish()
    {
        return $this->hasMany(FishStock::class, 'stockId');
    }
}
