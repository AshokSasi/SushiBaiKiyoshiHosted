<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        // $menuItem = MenuItem::latest()->get();

        return view('menuitems.index');
    }

    public function showCreate()
    {

        return view('menuitems.create');
    }

    public function showEdit()
    {
        return view('menuitems.edit');
    }

    // public function show(MenuItem $menuItem)
    // {
    //     return view('menuitems.show', compact('menuitem'));
    // }
    
}
