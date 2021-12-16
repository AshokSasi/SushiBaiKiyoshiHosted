<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishStock extends Model
{
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'id');
    }
}
