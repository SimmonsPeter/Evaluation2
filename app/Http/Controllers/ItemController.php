<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index',['items'=>$items]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|max:255',
            'description'=>'required',
        ]);
        Item::create($validated);
        return redirect()->route('items.index');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('edit',['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'=>'required|max:255',
            'description'=>'required'
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);
        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index');
    }
}
