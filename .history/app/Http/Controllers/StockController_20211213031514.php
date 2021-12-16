<?php

// Title:      Controllers/OrdersController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the stocks in our website which controls the 
//             the functions features involving stocks.

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

    //Retrieves all the fish entries from the database then passes them to the stock page
    public function index()
    {
        $stocks = Stock::with('fish')->get();

        return view('stock.index')->with('stocks', $stocks);
    }

    //Retrieves all the entries from the fish prices table for a particular stock id and returns in both an array format
    //as well as in a collection format with relationships
    public function show($id)
    {
        $stocks = Stock::with('fish')->find($id);

        $fishStock = DB::table('tblFish')

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
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stock.edit', compact('stock'));
    }

    public function update($id, Request $request)
    {
        //  $stock = Stock::find($id);

        $this->validate($request, [
            'quantity' => 'required'
        ]);

        Stock::where('stockId', $id)
            ->update([
                'stockQuantity' => $request->input('quantity')
            ]);

        return view('stock.edit', compact('stock'));
    }
}
