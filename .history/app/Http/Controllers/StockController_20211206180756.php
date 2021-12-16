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
        $stocks = Stock::with('fish')->find($id);
        // $stocks = $stock::with('fish')->get();
        //dd($stocks);

        $fishStock = DB::table('fish_stocks')

            ->select(

                DB::raw("fishPriceDate as year"),

                DB::raw("fishPrice as price")
            )
            ->where("stockId", "=", $id)
            ->get();


        $result[] = ['year', 'price'];

        foreach ($fishStock as $key => $value) {

            $result[++$key] = [$value->year, (float)$value->price];
        }

        return view('stock.show')->with('stocks', $stocks)->with('fishStock', json_encode($result));
    }

    public function create()
    {

        return view('stock.create');
    }
}
