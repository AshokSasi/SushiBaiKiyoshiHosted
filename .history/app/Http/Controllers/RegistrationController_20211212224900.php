<?php

// Title:      Controllers/OrdersController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the registration features in our website which controls the 
//             the functions features involving registration.

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        $user = new User;
        dd($user->getTable)();
        return view('registration.create');
    }



    public function store(RegistrationForm $form)
    {

        $form->persist();

        session()->flash('message', 'Thanks so much for signing up!');

        return redirect()->home();
    }
}
