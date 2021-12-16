<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    protected $table = 'menu_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menuItemName', 'menuItemDescription', 'menuItemPrice', 'menuItemImage', 'menuDiscountPercent', 'menuDiscountDate'
    ];
}
