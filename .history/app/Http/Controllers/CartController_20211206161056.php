<?php

namespace App\Http\Controllers;

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
    }
}
