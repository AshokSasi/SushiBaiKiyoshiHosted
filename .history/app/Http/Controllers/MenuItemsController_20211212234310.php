<?php

// Title:      Controllers/MenuItemsController.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the controller for the menuitems in our website which controls the 
//             the functions features for the menu.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItems;
use App\Stock;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class MenuItemsController extends Controller
{

    //Displays the menu, taking all the items of the database and passing it to the index page
    public function index()
    {
        $menuItem = MenuItems::with('menuStock')->get();
        //dd($menuItem);

        return view('menuitems.index', compact('menuItem'));
    }

    //Displays the add menuitem page
    public function showCreate()
    {
        $stock = Stock::get();
        return view('menuitems.create', compact('stock'));
    }

    //Displays the edit menuitem page, pulling the data on the item from the database.
    public function showEdit($id)
    {

        $item = MenuItems::find($id);

        $stockList = Stock::get();

        return view('menuitems.edit', compact('item'), compact('stockList'));
    }

    //Updates the data of a menuitem object in the database. Will check to see if a new image has been uploaded and 
    //allows for updates without re-uploading an image. Redirects back to the menu if successful. 
    public function update($id, Request $request)
    {
        $destinationPath = public_path('img');
        $this->validate($request, [
            'itemname' => 'required',
            'body' => 'required',
            'price' => 'required'
        ]);

        $menuItem = MenuItems::with('menuStock')->get();
        $currentMenuItem = $menuItem->find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move($destinationPath, $file->getClientOriginalName());


            MenuItems::where('id', $id)
                ->update([
                    'menuItemName' => $request->input('itemname'),
                    'menuItemDescription' => $request->input('body'),
                    'menuItemPrice' => $request->input('price'),
                    'menuItemImage' => $file->getClientOriginalName()
                ]);

            DB::delete('delete from menu_items_stock where menu_items_id = ?', [$id]);
            $tagNames = explode(',', $request->get('tags'));
            foreach ($tagNames as $tagName) {
                $tag = Stock::firstOrCreate(['stockDescription' => $tagName]);
                if ($tag) {
                    $currentMenuItem->menuStock()->attach($tag->stockId);
                }
            }
        } else {
            MenuItems::where('id', $id)
                ->update([
                    'menuItemName' => $request->input('itemname'),
                    'menuItemDescription' => $request->input('body'),
                    'menuItemPrice' => $request->input('price'),
                ]);

            DB::delete('delete from menu_items_stock where menu_items_id = ?', [$id]);
            $tagNames = explode(',', $request->get('tags'));
            foreach ($tagNames as $tagName) {
                $tag = Stock::firstOrCreate(['stockDescription' => $tagName]);
                if ($tag) {
                    $currentMenuItem->menuStock()->attach($tag->stockId);
                }
            }
        }

        session()->flash(
            'message',
            'Item has been updated.'
        );

        return redirect()->route('menu');
    }

    //Removes a menuitem object from the database and the menu. Then flashes a message saying the item has been deleted.
    public function destroy($id)
    {
        DB::delete('delete from tblStockMenu where menuItemId = ?', [$id]);
        DB::delete('delete from menu_items where id = ?', [$id]);
        session()->flash(
            'message',
            'Item has been deleted.'
        );
        return redirect()->route('menu');
    }


    //Stores the details entered as a menuitem object and adds it into the database. Will check to see if an image has been 
    //added and will flash an errors if a field is missing. Redirects back to the menu if successful.
    public function store(Request $request)
    {
        $destinationPath = public_path('img');
        $this->validate($request, [
            'itemname' => 'required',
            'body' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->move($destinationPath, $file->getClientOriginalName());

            $menuItem = new MenuItems();

            $menuItem->menuItemName = $request->input('itemname');
            $menuItem->menuItemDescription = $request->input('body');
            $menuItem->menuItemPrice = $request->input('price');
            $menuItem->menuItemImage = $file->getClientOriginalName();

            $menuItem->save();

            $tagNames = explode(',', $request->get('tags'));
            foreach ($tagNames as $tagName) {
                $tag = Stock::firstOrCreate(['stockDescription' => $tagName]);
                if ($tag) {
                    $menuItem->menuStock()->attach($tag->stockId);
                }
            }

            session()->flash(
                'message',
                'Item has been added to menu.'
            );

            return redirect()->route('menu');
        } else {
            return

                session()->flash(
                    'message',
                    'There was a problem adding that item.'
                );
            redirect()->route('menu');
        }
    }
}
