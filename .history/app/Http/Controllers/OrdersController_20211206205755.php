<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        $total = 0;

        foreach (session('cart') as $id => $menuItems) {
            $total += $menuItems['price'] * $menuItems['quantity'];
        }


        $order = new Order();

        $order->orderStatus = 1;
        $order->orderTotal = $total;
        $order->userId = Auth::user;
        $order->menuItemImage = $file->getClientOriginalName();

        $menuItem->save();
    }
}
