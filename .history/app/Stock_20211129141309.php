<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $primaryKey = 'stock_id';
    public function fish()
    {
        return $this->hasOne(FishStock::class);
    }
}
