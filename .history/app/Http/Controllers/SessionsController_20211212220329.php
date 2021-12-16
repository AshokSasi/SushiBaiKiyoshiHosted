<?php

// Title:      Controllers/OrdersController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the login function in our website which controls the 
//             the functions features involving login.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {

        // dd(bcrypt($request->userPassword));
        dd(Auth::attempt(array(
            'userEmail' => $request->email,
            'password'  => bcrypt($request->password),
        )));
        //dd(auth()->attempt(request(['userEmail', 'userPassword'])));

        Auth::attempt(array(
            'userEmail' => $request->userEmail,
            'userPassword'  => $request->userPassword,
        ));
        if (!auth()->attempt(request(['userEmail', 'userPassword']))) {
            //dd(request(['email', 'password']));
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }



        session()->flash('message', 'You have signed in!');

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        session()->flash('message', 'You have signed out!');
        return redirect()->home();
    }
}
