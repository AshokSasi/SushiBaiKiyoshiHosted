<?php

// Title:      Controllers/AdminController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for viewing all the Users in our website and allows
//             to view and edit user details.

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

    /**
     * Queries the tblUser and passes the data to the index page. Also applies simple pagination.
     */
    public function index()
    {
        $users = DB::table('tblUser')->simplePaginate(10);
        return view('admin.index', compact('users'));
    }

    /**
     * Finds a user by the inputted id. Redirects to the user page for the user matching that id.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.show', compact('user'));
    }

    /**
     * Redirects to the create a new user page.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Tries to submit the information into the database. Will flash a message and redirect back to
     * the all users index page if successful.
     */
    public function store(UserCreateForm $form)
    {

        $form->persist();

        session()->flash('message', 'Created User!');

        return redirect()->route('admin');
    }

    /**
     * Deletes a user with the selected id. Will flash a message and redirect back to all users
     * page.
     */
    public function destroy($id)
    {
        DB::delete('delete from users where userId = ?', [$id]);
        session()->flash(
            'message',
            'User has been deleted.'
        );
        return redirect()->route('admin');
    }

    /**
     * Retrieves a user in the database with the selected id. Will then pass that information
     * to the edit a user page for admins.
     */
    public function showEdit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    /**
     * Validates the inputted data and uses it to update a user in the database. Will flash a message
     * and redirect back to the all users page if successful.
     */
    public function update($id, Request $request)
    {

        $this->validate($request, [
            'userEmail' => 'required|email',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userPhoneNumber' => 'required',
            'role' => 'required'
        ]);

        User::where('userId', $id)
            ->update([
                'userEmail' => $request->input('userEmail'),
                'userFirstName' => $request->input('userFirstName'),
                'userLastName' => $request->input('userLastName'),
                'userPhoneNumber' => $request->input('userPhoneNumber'),
                'userPosition' => $request->input('role'),

            ]);


        session()->flash(
            'message',
            'User has been updated.'
        );


        return redirect()->route('admin');
    }
}
