<?php

// Title:      Requests/UserCreateForm.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the users in our website which controls the 
//             the functions features involving users.

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\Welcome;

class UserCreateForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'userEmail' => 'required|email|unique:tblUser,userEmail',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userPassword' => 'required|confirmed',
            'userPhoneNumber' => 'required',
            'role' => 'required'
        ];
    }

    public function persist()
    {
        // $position = 'c';
        $user = User::create([
            'userEmail' => request('userEmail'),
            'userFirstName' => request('userFirstName'),
            'userLastName' => request('userLastName'),
            'userPassword' => bcrypt(request('userPassword')),
            'userPhoneNumber' => request('userPhoneNumber'),
            'userPosition' => request('role'),
        ]);

        ///auth()->login($user);
    }
}
