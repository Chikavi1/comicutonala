<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Auth;

use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
 

class ItemsController extends Controller
{

    public function index()
    {
        $items = Items::all();
        return view('items.index')->with(compact('items'));
    }

    public function creandoConId($id)
    {
        return view('items.create')->with(compact('id'));
    }
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'pricing' => 'required|integer',
        //     'sellers_id' => 'unique:items'
        // ]);

           
           if($request->hasFile('image')){
            $path = $request->file('image')->store('public');
            $fileName = collect(explode('/', $path))->last();
            $image = Image::make(\Storage::get($path));
            $image->resize(1024, 683, function ($constraint) {
              //$constraint->aspectRatio();
              $constraint->upsize();
            });
            Storage::put($path, (string) $image->encode('jpg', 70));
           
        }

        $item = new Items([
            'sellers_id' => $request->get('sellers_id'),
            'title' => $request->get('title'),
            'pricing' => $request->get('pricing'),
            'image' => $path,
            'description' => $request->get('description'),
            'category' => $request->get('category')
        ]);
        $item->save();
        
        if((Auth::user()->seller->slug)){
         return redirect()->route('seller.index'); 
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
