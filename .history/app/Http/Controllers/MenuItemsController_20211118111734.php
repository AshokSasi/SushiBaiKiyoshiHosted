<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItems;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class MenuItemsController extends Controller
{
    public function index()
    {
        //$menuItem = MenuItem::get();
        //$menuItem = Menu_Items::all();
        $menuItems = DB::table('menu_items')->get();
        //dd($menuItem);
        return view('menuitems.index', compact('menuItems'));
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

    public function store(Request $request)
    {
        $destinationPath = public_path('img');
        $this->validate(request(), [
            'itemname' => 'required',
            'body' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move($destinationPath, $file->getClientOriginalName());
        } else {
            dd('NO FILe FOUND');
        }
    }

    // public function show(MenuItem $menuItem)
    // {
    //     return view('menuitems.show', compact('menuitem'));
    // }
}
