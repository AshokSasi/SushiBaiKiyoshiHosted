<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'orderedQuantity'
    ];

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
