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

        $item = MenuItems::find($id);

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $item->menuItemName,
                    "description" => $item->menuItemDescription,
                    "price" => $item->menuItemPrice,
                    "image" => $item->menuItemImage
                ]
            ];
            session()->put('cart', $cart);
            session()->flash(
                'message',
                'Item been added to cart.'
            );
            return redirect()->route('cart');
        }
    }
}
