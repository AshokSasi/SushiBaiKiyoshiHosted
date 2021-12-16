<?php

namespace App\Http\Controllers;

use App\Order;
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
        $order = new Order();

        $order->orderStatus = $request->input('itemname');
        $order->menuItemDescription = $request->input('body');
        $order->menuItemPrice = $request->input('price');
        $order->menuItemImage = $file->getClientOriginalName();

        $menuItem->save();
    }
}
