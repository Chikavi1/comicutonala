<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sellers;
use Auth;
use Illuminate\Support\Str as Str;
 
class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Sellers::all();
        return view('seller.index')->with(compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
      $request->validate([
        'share_name'=>'required',
        'share_price'=> 'required|integer',
        'share_qty' => 'required|integer'
      ]);
      $share = new Share([
        'share_name' => $request->get('share_name'),
        'share_price'=> $request->get('share_price'),
        'share_qty'=> $request->get('share_qty')
      ]);
      $share->save();
      return redirect('/shares')->with('success', 'Stock has been added');
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'user_id' => 'unique:sellers,user_id'
        ]);
      
        $seller = new Sellers([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('slug')),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'cellphone' => $request->get('cellphone'),
            'salon' => $request->get('salon'),
            'available' => "1"
        ]);
        $seller->save();
        return redirect('/seller')->with('success','se creo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($slug){
        $seller = Sellers::where('slug','=',$slug)->firstOrFail();
        return view('seller.show')->with(compact('seller'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Sellers::findorFail($id);
        return view('seller.edit')->with(compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        Sellers::where('slug','=',$slug)->firstOrFail()->update($request->all());
        return redirect()->route('seller', [$slug]);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter($id){
        $seller = Sellers::findorFail($id);
        return view('seller.filter')->with(compact('seller'));
    }
    public function filter2(){
        return view('seller.filter2');
    }
}
