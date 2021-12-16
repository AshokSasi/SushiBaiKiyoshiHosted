<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    //
    protected $primaryKey = 'orderedItemsId';
    public $timestamps = false;
    protected $fillable = [
        'orderedQuantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
        // return $this->belongsTo(Order::class);
    }

    public function orderMenu()
    {
        return $this->hasMany(MenuItems::class, 'id');
        //return $this->belongsTo(MenuItems::class);

    }
}