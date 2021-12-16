<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the ordered item object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    //
    protected $primaryKey = 'orderedItemsId';
    public $timestamps = false;
    protected $fillable = [
        'orderedQuantity'
    ];

    //Sets the relationship between this model and the order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderMenu()
    {
        return $this->belongsTo(MenuItems::class, 'id');

    }
}
