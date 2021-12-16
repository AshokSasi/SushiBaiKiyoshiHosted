<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the Stock object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tblStock';
    protected $primaryKey = 'stockId';

    //sets the relationship between this model and the fishstock model
    public function fish()
    {
        return $this->hasMany(FishStock::class, 'stockId');
    }

    //sets the relationship between this model and the fishstock model but returns the latest record first
    public function latestFish()
    {
        return $this->hasMany(FishStock::class, 'stockId')->latest('fishPriceDate');
    }

    //sets the relationship between this model and the menuitem model
    public function menuItem()
    {
        return $this->belongsToMany(MenuItems::class);
    }
}
