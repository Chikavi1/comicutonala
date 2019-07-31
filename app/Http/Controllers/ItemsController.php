<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Auth;

use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
use App\Categories;
use App\Sellers;
class ItemsController extends Controller
{

    public function index()
    {
        $items = Items::all();
        return view('items.index')->with(compact('items'));
    }

    public function creandoConId($id)
    {  
        $categories = Categories::all();
        return view('items.create')->with(compact('id','categories'));
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
             'image' => 'mimes:jpeg,png'
         ]);
            $path = null ;
           
           if($request->hasFile('image')){
            $path = $request->file('image')->store('public');
            $fileName = collect(explode('/', $path))->last();
            $image = Image::make(\Storage::get($path));
            $image->resize(1024, 683, function ($constraint) {
              //$constraint->aspectRatio();
              $constraint->upsize();
            });
            Storage::put($path, (string) $image->encode('jpg', 80));
           
        }

        $seller = Sellers::where("id", $request->get('sellers_id'))->first();
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
         return redirect()->route('seller.show',$seller->slug)->with('success','Se agrego el ítem.');; 
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
        $categories = Categories::all();
        $item = Items::findOrFail($id);
        return view('items.edit')->with(compact('item','categories'));
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
