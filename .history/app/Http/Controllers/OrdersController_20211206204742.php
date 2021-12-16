<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('orders.index');
    }

    public function store()
    {
        $menuItem = new MenuItems();

        $menuItem->menuItemName = $request->input('itemname');
        $menuItem->menuItemDescription = $request->input('body');
        $menuItem->menuItemPrice = $request->input('price');
        $menuItem->menuItemImage = $file->getClientOriginalName();

        $menuItem->save();
    }
}
