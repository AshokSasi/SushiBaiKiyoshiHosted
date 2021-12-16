<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'orderId';
    protected $fillable = [
        'orderStatus', 'orderTotal'
    ];

    public function items()
    {
        return $this->hasMany(OrderedItem::class, 'orderId');
        // return $this->hasMany(OrderedItem::class, 'orderId');
    }
}
