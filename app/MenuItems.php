<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the menuitems object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{


    protected $table = 'tblMenuItem';
    protected $primaryKey = 'menuItemId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menuItemName', 'menuItemDescription', 'menuItemPrice', 'menuItemImage'
    ];

    //Sets a relationship between this model and the stock model
    public function menuStock()
    {
        return $this->belongsToMany(Stock::class, 'tblStockMenu', 'menuItemId', 'stockId');
    }

    //Sets a relationship between this model and the order model by using a pivot table
    public function menuOrder()
    {

        return $this->belongsToMany(Order::class, 'tblOrderedItems', 'menuItemId', 'orderId');
    }
}
