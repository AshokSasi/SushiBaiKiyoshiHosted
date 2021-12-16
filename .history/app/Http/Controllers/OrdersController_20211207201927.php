<?php

namespace App\Http\Controllers;

use App\MenuItems;
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

        $orders = Order::with('items')->get();
        $menuItems = OrderedItem::with('orderMenu')->get();

        //dd($menuItems);
        return view('orders.index', compact('orders'), compact('menuItems'));
    }

    public function show($id)
    {
        $order = Order::with('items')->find($id);
        $menuItems = OrderedItem::with('orderMenu')->get();
        foreach ($menuItems as $menuItem) {
            if ($id == $menuItem->id) {
                $var = $menuItem;
            }
        }

        // $menuItem = MenuItems::with('menuStock')->get();
        // $currentMenuItem = $menuItem->find($id);

        dd($var);
        return view('orders.show', compact('order'));
    }

    public function update($id, Request $request)
    {
        //dd($request->input('status'));
        Order::where('orderId', $id)
            ->update([
                'orderStatus' => $request->input('status'),

            ]);

        session()->flash(
            'message',
            'Order status has been updated.'
        );
        return redirect()->route('allOrders');
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

        foreach (session('cart') as $id => $menuItems) {

            $orderedItems = new OrderedItem();
            $orderedItems->orderId = $currentOrder->orderId;
            $orderedItems->menuItemId = $id;
            $orderedItems->orderedQuantity = $menuItems['quantity'];
            $orderedItems->save();
        }

        // $orderedItems->orderId = $order->orderId;
        // dd(Order::latest()->first());
        // $orderedItems->orderTotal = $total;
        // $orderedItems->userId = Auth::user()->userId;

        session()->forget('cart');
        return redirect()->route('menu');
    }
}
