<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menuItem = MenuItem::latest()->get();

        return view('menu.index');
    }

    public function showCreate()
    {
   

        return view('menu.create');
    }

    public function showEdit()
    {
        return view('menu.edit');
    }
    
}
