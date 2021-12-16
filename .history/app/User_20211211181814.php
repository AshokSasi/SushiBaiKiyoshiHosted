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
        'email', 'userFirstName', 'userLastName', 'password', 'userPhoneNumber', 'userPosition'
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function userOrder()
    {
        return $this->hasMany(Order::class, 'userId');
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);

        //  //create
        //  Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

    }
}
