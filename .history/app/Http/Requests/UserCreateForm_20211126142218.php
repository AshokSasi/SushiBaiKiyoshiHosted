<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\Welcome;

class RegistrationForm extends FormRequest
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

            'email' => 'required|email',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'password' => 'required|confirmed',
            'userPhoneNumber' => 'required'
        ];
    }

    public function persist()
    {
        $position = 'c';
        $user = User::create([
            'email' => request('email'),
            'userFirstName' => request('userFirstName'),
            'userLastName' => request('userLastName'),
            'password' => bcrypt(request('password')),
            'userPhoneNumber' => request('userPhoneNumber'),
            'userPosition' => $position,
        ]);

        auth()->login($user);
    }
}
