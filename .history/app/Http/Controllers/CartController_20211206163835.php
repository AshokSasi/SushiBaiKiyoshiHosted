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

        return view('cart.index');
    }

    public function addToCart($id)
    {
        ->session()->forget('key');

        $item = MenuItems::find($id);

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $item->menuItemName,
                    "description" => $item->menuItemDescription,
                    "price" => $item->menuItemPrice,
                    "image" => $item->menuItemImage,
                    "quantity" => 1
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
            session()->flash(
                'message',
                'Item has been added to cart.'
            );
            return redirect()->route('menu');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $item->menuItemName,
            "description" => $item->menuItemDescription,
            "price" => $item->menuItemPrice,
            "image" => $item->menuItemImage,
            "quantity" => 1
        ];

        session()->flash(
            'message',
            'Item has been added to cart.'
        );
        return redirect()->route('menu');
    }
}
