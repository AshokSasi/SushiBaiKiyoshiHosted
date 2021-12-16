<?php

// Title:      Controllers/UserController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the users in our website which controls the 
//             the functions features involving users.

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth') ;
     
    }

    //Displays the user information page in the website
    public function index()
    {
 
        return view('user.index');
    }

    //Displays the order history page in the website.
    public function orders()
    {
 
        return view('user.orders');
    }
}
