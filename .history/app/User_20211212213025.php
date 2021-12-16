<?php

// Title:      app/User.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the user object model for our website.
//

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userEmail', 'userFirstName', 'userLastName', 'userPassword', 'userPhoneNumber', 'userPosition'
    ];
    protected $primaryKey = 'userId';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //sets the relationship between this model and the order model
    public function userOrder()
    {
        return $this->hasMany(Order::class, 'userId');
    }
}
