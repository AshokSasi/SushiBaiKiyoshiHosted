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

    protected $primaryKey = 'userId';
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

            'userEmail' => 'required|email|unique:users,email',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userPassword' => 'required|confirmed',
            'userPhoneNumber' => 'required'
        ];
    }

    public function persist()
    {
        $position = 'c';
        $user = User::create([
            'userEmail' => request('userEmail'),
            'userFirstName' => request('userFirstName'),
            'userLastName' => request('userLastName'),
            'userPassword' => bcrypt(request('userPassword')),
            'userPhoneNumber' => request('userPhoneNumber'),
            'userPosition' => $position,
        ]);

        $user = new User();

        $user->userEmail = request('userEmail');
        $user->userFirstName = request('userFirstName');
        $user->userLastName = request('userLastName');
        $user->userPassword = bcrypt(request('userPassword'));
        $user->userPhoneNumber = request('userEmail');
        $user->userPosition = request('userEmail');

        $menuItem->save();

        //auth()->login($user);
    }
}
