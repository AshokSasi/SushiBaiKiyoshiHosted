<!-- 
Title:      vendor/about.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page generates the about page content for the website which displays the about us 
            information about the store. This page features an embedded google maps with the store
            location. 
-->
<?php

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
