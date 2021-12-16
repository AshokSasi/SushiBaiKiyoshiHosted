<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class MenuItemController extends Controller
{
    public function index()
    {
        // $menuItem = MenuItem::latest()->get();
        //$menuItem = MenuItem::all();
        $menuItem = DB::table('menu_items')->get();
        return view('menuitems.index', compact('menuitems'));
        //return view('posts.index',compact('posts'));
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
