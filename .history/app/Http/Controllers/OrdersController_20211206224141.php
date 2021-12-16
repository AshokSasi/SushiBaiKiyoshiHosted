<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderedItem;
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

    public function store()
    {
        $total = 0;

        foreach (session('cart') as $id => $menuItems) {
            $total += $menuItems['price'] * $menuItems['quantity'];
        }

        //  dd($total);
        $order = new Order();

        $order->orderStatus = "In Progress";
        $order->orderTotal = $total;
        $order->userId = Auth::user()->userId;

        $order->save();

        $currentOrder = Order::latest()->first();
        dd($currentOrder->orderId);
        foreach (session('cart') as $id => $menuItems) {
            $orderedItems = new OrderedItem();
            $orderedItems->orderId = $currentOrder->orderId;
            dd($currentOrder->orderId);
        }

        // $orderedItems->orderId = $order->orderId;
        // dd(Order::latest()->first());
        // $orderedItems->orderTotal = $total;
        // $orderedItems->userId = Auth::user()->userId;

        session()->forget('cart');
        return redirect()->route('menu');
    }
}
