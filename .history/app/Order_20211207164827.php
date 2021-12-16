<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderStatus', 'orderTotal'
    ];

    public function items()
    {
        return $this->belongsToMany(OrderedItem::class);
    }
}
