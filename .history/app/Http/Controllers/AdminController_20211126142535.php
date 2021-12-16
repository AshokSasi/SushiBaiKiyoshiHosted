<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateForm;
use Illuminate\Support\Facades\DB;
use App\User;

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

        session()->flash('message', 'Thanks so much for signing up!');

        return redirect()->home();
    }
}
