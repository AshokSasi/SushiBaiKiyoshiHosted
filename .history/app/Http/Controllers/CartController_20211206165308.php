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
        dd(session()->get('cart'));
        //session()->flush('cart');
        return view('cart.index');
    }

    public function addToCart($id)
    {
        $item = MenuItems::find($id);

        $cart = session()->get('cart');
        // if cart is empty then this the first product
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
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            session()->flash(
                'message',
                'Item has been added to cart.'
            );
            return redirect()->route('menu');
        }
        // if item not exist in cart then add to cart with quantity = 1
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
