<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sellers;
use Auth;
use App\Categories;
use App\Schedules;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as Str;
 
use App\Items;
use App\User;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
        $sellers = Sellers::Search($request->get("busqueda"));

        return view('seller.index')->with(compact('sellers'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('seller.create')->with(compact('categories'));
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
        
        $user = User::where('id',Auth::user()->id)->get();
        $escuela = $user[0]->school;


        $request->validate([
            'title' => 'required',
            'user_id' => 'unique:sellers,user_id',
            'image'=>'required|image'
        ]);
       
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public');
            $fileName = collect(explode('/', $path))->last();
            $image = Image::make(\Storage::get($path));
            $image->resize(1280,null, function ($constraint) {
//              $constraint->aspectRatio();
              $constraint->upsize();
            });
            Storage::put($path, (string) $image->encode('jpg', 60));
           
        }
        
        $inicia = $request->get('inicia');
        $finaliza = $request->get('finaliza');
        $schedule = $inicia." - ".$finaliza;


        $seller = new Sellers([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'image' => $path,
            'slug' => Str::slug($request->get('title')),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'cellphone' => $request->get('cellphone'),
            'salon' => $request->get('salon'),
            'available' => "1",
            'school' => $escuela,
            'schedule' => $schedule
        ]);
        $seller->save();
        return redirect()->route('profile')->with('success','Se creo satisfactoriamente tu pagina de vendedor.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($slug){
        $seller = Sellers::where('slug','=',$slug)->firstOrFail();
        $items = Items::where("sellers_id",$seller->id)->get();
        return view('seller.show')->with(compact('seller','items'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $seller = Sellers::findorFail($id);
        $hora1 = null;
        $hora2 = null;
        if($seller->schedule){
        list($hora1, $hora2) = explode(' - ', $seller->schedule);
    }

        return view('seller.edit')->with(compact('seller','categories','hora1','hora2'));
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

        $seller = Sellers::where('slug','=',$slug)->firstOrFail();
        if($request->hasFile('image')){
            $antiguaFoto = $seller->image;
            $antiguaFoto = collect(explode('/', $antiguaFoto))->last();
            $mi_imagen = 'storage/'.$antiguaFoto;
            if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
            }     

            $path = $request->file('image')->store('public');
            $fileName = collect(explode('/', $path))->last();
            $image = Image::make(\Storage::get($path));
            $image->resize(1280,null, function ($constraint) {
//              $constraint->aspectRatio();
              $constraint->upsize();
            });
            Storage::put($path, (string) $image->encode('jpg', 60));
            $seller->image = $path;
        }

     
        $schedule = $request->get('inicia')." - ".$request->get('finaliza');

        
        $seller->title = $request->get('title');
        $seller->description = $request->get('description');
        $seller->category = $request->get('category');
        $seller->cellphone = $request->get('cellphone');
        $seller->salon = $request->get('salon');
        $seller->available = $request->get('available');
        $seller->schedule = $schedule; 

        $seller->save();

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
        $categories = Categories::all();
        return view('seller.filter2')->with(compact('categories'));
    }
}
