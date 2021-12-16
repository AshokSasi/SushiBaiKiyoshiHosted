<?php

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
                    "description" => $item->menuItemDescription
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
            "description" => $item->menuItemDescription
        ];
        session()->put('cart', $cart);
        session()->flash(
            'message',
            'Item has been added to cart.'
        );
        return redirect()->route('menu');
    }
}
