<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderStatus', 'orderTotal', 'menuItemPrice', 'menuItemImage'
    ];
}
