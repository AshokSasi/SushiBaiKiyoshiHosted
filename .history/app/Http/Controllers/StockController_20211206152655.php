<?php

namespace App\Http\Controllers;

use App\FishStock;
use Illuminate\Http\Request;
use App\Stock;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$stocks = DB::table('stocks')->get();
        //$stocks = Stock::with('fishstock')->get();
        //$stocks = Stock::find(1)->fish;
        //dd($stocks);
        //return view('stock.index', compact('stocks'));
        $stocks = Stock::with('fish')->get();

        //dd($stocks);
        return view('stock.index')->with('stocks', $stocks);
    }

    public function show($id)
    {
        $stock = Stock::find($id)->with('fish');
        // $stocks = $stock::with('fish')->get();
        dd($stock);
        return view('stock.show')->with('stocks', $stocks);
    }

    public function create()
    {

        return view('stock.create');
    }
}
