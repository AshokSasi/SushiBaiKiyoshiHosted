<?php

// Title:      app/Stock.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the fishtock object model for our website.
//

namespace App;

use Illuminate\Database\Eloquent\Model;

class FishStock extends Model
{
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    protected $fillable = ['price', 'year'];
}
