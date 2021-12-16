<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth') ;
     
    }
    public function index()
    {
        $stocks = DB::table('stock')->get();
        //dd($menuItem);
        return view('stock.index', compact('stocks'));
    }

    public function show()
    {
 
        return view('stock.show');
    }
}
