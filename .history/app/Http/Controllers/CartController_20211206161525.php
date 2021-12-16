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
                    "description" => 1,
                    "price" => $product->price,
                    "image" => $product->photo
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
}
