<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the order object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tblOrder';
    protected $primaryKey = 'orderId';
    protected $fillable = [
        'orderStatus', 'orderTotal'
    ];

    //Sets relationship between this model and the ordereditem model
    public function items()
    {
        return $this->hasMany(OrderedItem::class, 'orderId');
    }

    //Sets the relationship between this model and the User model.
    public function orderUser()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    //Sets the relationship between this model and the menuitems model.
    public function orderMenu()
    {
        return $this->belongsToMany(MenuItems::class, 'tblOrderedItems', 'orderId', 'menuItemId');
    }
}
