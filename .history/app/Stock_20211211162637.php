<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the Stock object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $primaryKey = 'stockId';
    public function fish()
    {
        return $this->hasMany(FishStock::class, 'stockId');
    }

    public function menuItem()
    {
        return $this->belongsToMany(MenuItems::class);
    }
}
