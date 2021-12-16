<?php

// Title:      Controllers/CartController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the cart in our website which controls the 
//             the functions features for the cart.

namespace App\Http\Controllers;

use App\MenuItems;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //dd(session()->get('cart'));
        //session()->flush('cart');
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $item = MenuItems::find($id);

        $cart = session()->get('cart');

        // check if the cart is not empty. If it is not empty then add the dish with a quantity of 1
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $item->menuItemName,
                    "quantity" => 1,
                    "price" => $item->menuItemPrice,
                    "description" => $item->menuItemDescription,
                    "image" => $item->menuItemImage
                ]
            ];
            session()->put('cart', $cart);
            session()->flash(
                'message',
                'Item has been added to cart.'
            );
            return redirect()->route('menu');
        }
        // if the cart is not empty then check if the dish has already been added and increment the quantity o f the dish by 1
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            session()->flash(
                'message',
                'Item has been added to cart.'
            );
            return redirect()->route('menu');
        }
        //  if the cart is not empty and the item does not exist in the cart and add it to the cart 
        $cart[$id] = [
            "name" => $item->menuItemName,
            "quantity" => 1,
            "price" => $item->menuItemPrice,
            "description" => $item->menuItemDescription,
            "image" => $item->menuItemImage
        ];
        session()->put('cart', $cart);
        session()->flash(
            'message',
            'Item has been added to cart.'
        );
        return redirect()->route('menu');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function destroy($id)
    {

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        session()->flash(
            'message',
            'Item has been removed from cart'
        );
        return redirect()->route('cart');
    }
}
