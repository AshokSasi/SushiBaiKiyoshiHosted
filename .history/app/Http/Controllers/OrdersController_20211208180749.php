<?php

namespace App\Http\Controllers;

use App\MenuItems;
use App\Order;
use App\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $menuList = menuItems::with('menuOrder')->get();
        $statusFilterFlag = "ALL";

        dd($menuItems);
        return view('orders.index', compact('statusFilterFlag'), compact('orders'), compact('menuItems'));
    }

    public function filter(request $request)
    {
        $statusFilterFlag = $request->input('statusFilter');
        $orders = Order::with('items')->get();
        $menuItems = OrderedItem::with('orderMenu')->get();


        //dd($menuItems);
        return view('orders.index', compact('orders'), compact('statusFilterFlag'), compact('menuItems'));
    }

    public function show($id)
    {
        // $item = new MenuItems();
        $order = Order::with('items')->find($id);
        $orderedItem = Order::with('orderMenu')->get();
        $currentItem = $orderedItem->find($id);

        // dd($currentItem);
        // $menuitem = MenuItems::find($id);
        // $order1 = Order::find($id);
        // $orderMenuItems = $order1->orderMenu;
        //dd($orderMenuItems);
        //$menuItems = Order::with('orderMenu')->get();
        $user = Order::with('orderUser')->find($id);
        $currentUser = $user->orderUser;


        return view('orders.show', compact('order', 'user', 'currentItem'));
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

        $logFile = 'order_'.$order->orderId.'.txt';
        $textContent = "Order ID: ".$order->orderId;

        Storage::put($logFile, $textContent);

        $textContent = "Order Date: ".$order->created_at;

        Storage::append($logFile, $textContent);

        foreach ($order->orderMenu as $itemOrdered)
        {
            $currentItemName = $itemOrdered->menuItemName;
            foreach($order->items as $quantity) 
            {
                if($quantity->menuItemId == $itemOrdered->id)
                    $currentQuantity = $quantity->orderedQuantity;
            }
            $textContent = "Item: ".$currentItemName."       Quantity: ".$currentQuantity;
            Storage::append($logFile, $textContent);
        }

        $textContent = "";
        Storage::append($logFile, $textContent);

        $textContent = "End of ticket.";
        Storage::append($logFile, $textContent);

        session()->forget('cart');

        session()->flash(
            'message',
            'Your order has been placed.'
        );

        return redirect()->route('menu');
    }
}
