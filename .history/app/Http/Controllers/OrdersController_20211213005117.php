<?php

// Title:      Controllers/OrdersController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the orders in our website which controls the 
//             the functions features involving orders.

namespace App\Http\Controllers;

use App\MenuItems;
use App\Order;
use App\OrderedItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Displays the all orders page by drawing the necessary data from the database and passing them along with their
    //relationships and other variables to the page.
    public function index()
    {
        $orders = Order::with('items')->get();
        $orderMenuList = Order::with('orderMenu')->get();
        $menuList = MenuItems::with('menuOrder')->get();
        $dateFilterFlag = "Descending";
        $statusFilterFlag = "ALL";
        $menuFilterFlag = "ALL";
        $orders = Order::orderBy('created_at', 'DESC')->with('orderMenu')->get();
        $orderMenuList = Order::orderBy('created_at', 'DESC')->with('orderMenu')->get();
        return view('orders.index', compact('statusFilterFlag', 'menuFilterFlag', 'dateFilterFlag'), compact('orders', 'menuList', 'orderMenuList'));
    }

    //Displays the all orders page after using the filter button. Passes the requested information from the database,
    //updates the necessary variables and passes them to the page to perform the filter options.
    public function filter(request $request)
    {
        $statusFilterFlag = $request->input('statusFilter');
        $menuFilterFlag = $request->input('menuFilter');
        $dateFilterFlag = $request->input('dateFilter');
        $orders = Order::with('items')->get();
        $orderMenuList = Order::with('orderMenu')->get();
        $menuList = MenuItems::with('menuOrder')->get();
        if ($dateFilterFlag == "Ascending") {
            $orders = Order::orderBy('created_at', 'ASC')->with('orderMenu')->get();
            $orderMenuList = Order::orderBy('created_at', 'ASC')->with('orderMenu')->get();
        } else if ($dateFilterFlag == "Descending") {
            $orders = Order::orderBy('created_at', 'DESC')->with('orderMenu')->get();
            $orderMenuList = Order::orderBy('created_at', 'DESC')->with('orderMenu')->get();
        }

        return view('orders.index', compact('orders', 'menuList', 'orderMenuList'), compact('statusFilterFlag', 'menuFilterFlag', 'dateFilterFlag'));
    }

    //Retrieves an item with a specific id from the database and returns that specific item.
    public function show($id)
    {

        $order = Order::with('items')->find($id);
        $orderedItem = Order::with('orderMenu')->get();
        $currentItem = $orderedItem->find($id);

        $user = Order::with('orderUser')->find($id);
        $currentUser = $user->orderUser;


        return view('orders.show', compact('order', 'user', 'currentItem'));
    }

    //Updates the status of an order in the database.
    public function update($id, Request $request)
    {
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

    //Saves a order request as an order object. Then adds it into the database. Produces a log file which can
    //be used as a template to use as a ticket for the kitchen staff. Also flashes a message on successful order.
    public function store(Request $request)
    {
        $total = 0;
        $email = $request->input('email');
        $currentQuantity = 0;
        foreach (session('cart') as $id => $menuItems) {
            $total += $menuItems['price'] * $menuItems['quantity'];
        }

        $order = new Order();

        $order->orderStatus = "In Progress";
        $order->orderTotal = $total;
        if (!is_null($email)) {
            $user = User::where('userEmail', $email)->first();
            $order->userId = $user->userId;
        } else {
            $order->userId = Auth::user()->userId;
        }


        $order->save();

        $currentOrder = Order::latest()->first();

        foreach (session('cart') as $id => $menuItems) {

            $orderedItems = new OrderedItem();
            $orderedItems->orderId = $currentOrder->orderId;
            $orderedItems->menuItemId = $id;
            $orderedItems->orderedQuantity = $menuItems['quantity'];
            $orderedItems->save();
        }

        $logFile = 'order_' . $order->orderId . '.txt';
        $textContent = "Order ID: " . $order->orderId;

        Storage::put($logFile, $textContent);

        $textContent = "Order Date: " . $order->created_at;

        Storage::append($logFile, $textContent);

        foreach ($order->orderMenu as $itemOrdered) {
            $currentItemName = $itemOrdered->menuItemName;
            foreach ($order->items as $quantity) {
                if ($quantity->menuItemId == $itemOrdered->id)
                    $currentQuantity = $quantity->orderedQuantity;
            }
            $textContent = "Item: " . $currentItemName . "       Quantity: " . $currentQuantity;
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

        if (Auth::user()->userPosition == "a") {
            return redirect()->route('allOrders');
        }
    }
}
