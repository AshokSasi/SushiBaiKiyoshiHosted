<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the menuitems object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{


    protected $table = 'menu_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menuItemName', 'menuItemDescription', 'menuItemPrice', 'menuItemImage'
    ];

    public function menuStock()
    {
        return $this->belongsToMany(Stock::class);
    }

    public function menuOrder()
    {
        // return $this->hasMany(OrderedItem::class, 'menuItemId');
        //return $this->hasMany(OrderedItem::class, 'menuItemId');
        return $this->belongsToMany(Order::class, 'ordered_items', 'menuItemId', 'orderId');

    }
}
