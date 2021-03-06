<?php

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
        return $this->belongToMany(Order::class, 'ordered_items', 'orderId', 'menuItemId');

    }
}
