<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class StockController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth') ;
     
    }
    public function index()
    {
        $stocks = DB::table('stocks')->get()->FishStock;
        //dd($menuItem);
        return view('stock.index', compact('stocks'));
    }

    public function show()
    {
 
        return view('stock.show');
    }
}
