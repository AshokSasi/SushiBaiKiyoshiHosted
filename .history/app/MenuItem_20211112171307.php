<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'email', 'userFirstName', 'userLastName', 'password', 'userPhoneNumber', 'userPosition'
    ];
}
