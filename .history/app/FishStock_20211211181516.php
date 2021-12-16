<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the fishstock object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishStock extends Model
{
    //Sets the relationship between fishstock and stock
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    protected $fillable = ['price', 'year'];
}
