<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function scopeIncomplete($query) 
    {
        return static::where('completed',0)->get();
    }
}

//===================================Commented Code==============================================
// public static function incomplete()
// {
//     return static::where('completed',0)->get();
// }