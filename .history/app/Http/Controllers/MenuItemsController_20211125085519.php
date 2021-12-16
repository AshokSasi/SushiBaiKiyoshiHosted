<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuItems;
use Illuminate\Support\Facades\DB; // this will import the DB facade into your controller class

class MenuItemsController extends Controller
{
    public function index()
    {
        //$menuItem = MenuItem::get();
        //$menuItem = Menu_Items::all();
        $menuItems = DB::table('menu_items')->get();
        //dd($menuItem);
        return view('menuitems.index', compact('menuItems'));
        //return view('posts.index',compact('posts'));
    }

    public function showCreate()
    {

        return view('menuitems.create');
    }

    public function showEdit($id)
    {
        $item = MenuItems::find($id);
        // dd($item);
        return view('menuitems.edit', compact('item'));
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
        DB::delete('delete from menu_items where id = ?', [$id]);
        session()->flash(
            'message',
            'Item has been deleted.'
        );
        return redirect()->route('menu');
    }

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

    // public function show(MenuItem $menuItem)
    // {
    //     return view('menuitems.show', compact('menuitem'));
    // }
}
