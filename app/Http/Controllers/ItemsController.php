<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Auth;

class ItemsController extends Controller
{

    public function index()
    {
        $items = Items::all();
        return view('items.index')->with(compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pricing' => 'required|integer',
            'seller_id' => 'unique:items'
        ]);

        $item = new Items([
            'sellers_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'pricing' => $request->get('pricing')
        ]);
        $item->save();
        
        if((Auth::user()->seller->slug)){
         return redirect()->route('seller', ['id' =>  Auth::user()->seller->slug]); 
        }else{
            dd("error");
        }
       
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Items::findOrFail($id);
        return view('items.edit')->with(compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Items::findOrFail($id)->update($request->all());
        return redirect()->route('seller', ['id' =>  Auth::user()->seller->slug]); 
    }

    public function destroy($id)
    {
        $item = Items::findOrFail($id);
        $item->delete();
          return redirect()->route('seller', ['id' =>  Auth::user()->seller->slug]); 
    }
}
