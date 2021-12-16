<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\UserCreateForm;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.show', compact('user'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(UserCreateForm $form)
    {

        $form->persist();

        session()->flash('message', 'Created User!');

        return redirect()->route('admin');
    }

    public function destroy($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        session()->flash(
            'message',
            'User has been deleted.'
        );
        return redirect()->route('admin');
    }


    public function showEdit($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('admin.edit', compact('user'));
    }

    public function update($id, Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userPhoneNumber' => 'required',
            'role' => 'required'
        ]);

        User::where('id', $id)
            ->update([
                'email' => $request->input('email'),
                'userFirstName' => $request->input('userFirstName'),
                'userLastName' => $request->input('userLastName'),
                'password' => $request->input('password'),
                'userPhoneNumber' => $request->input('userPhoneNumber'),
                'userPosition' => $request->input('userPosition'),

            ]);




        session()->flash(
            'message',
            'User has been updated.'
        );


        return redirect()->route('admin');
    }
}
