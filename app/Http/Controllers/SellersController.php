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
use Mail;
use App\items;
use App\User;

class SellersController extends Controller
{
  
    public function index(Request $request)
    {
        $sellers = Sellers::Search($request->get("busqueda"));

        return view('seller.index')->with(compact('sellers'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('seller.create')->with(compact('categories'));
    }
    public function store(Request $request)
    {
        
         $user = User::where('id',Auth::user()->id)->first();



        $request->validate([
            'title' => 'unique:sellers',
            'user_id' => 'unique:sellers,user_id',
            'image'=>'required|image',
            'cellphone' => 'numeric',
            'finaliza' => 'required|after:inicia'
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
            'schedule' => $schedule,
            'status' => Sellers::PENDIENTE,
        ]);
        $nombre = $user->name;
        $email = $user->email;
         Mail::send('email.nuevovendedor',compact('nombre'),function($msj)use($email){
                    $msj->from("tucorreo@ventasuni.com","Luis rojas");
                    $msj->subject('Bienvenido a tu perfil de vendedor');
                    $msj->to($email);
                });
        $seller->save();

      

        return redirect()->route('profile')->with('success','Se envio tu solicitud.');
    }
      public function show($slug){
        $seller = Sellers::where('slug','=',$slug)->firstOrFail();
        if(Auth::check() && !(Auth::user()->id == $seller->user_id)){
            $seller->count_visits++;
            $seller->save();
        }

        if($seller->status == 4){
            return view('seller.bloqueado');
        }
        $items = Items::where("sellers_id",$seller->id)->paginate(6);
        if (\Request::ajax()) {
            return \Response::json(View('items.items', array('items' => $items,'seller' => $seller))->render());
        }

        return view('seller.show')->with(compact('seller','items'));

    }
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

 
    public function destroy($id)
    {
        //
    }


    public function upSeller($id){
        $seller = Sellers::findorFail($id);
        $estado = 'aprobado';
        $user = User::findorFail($seller->user_id)->first();
        $seller->status = 1;
        $seller->save();

        $this->enviar_email_estado($user->name,$estado,$seller->title,$user->email);
        

        return redirect()->route('admin.vendedores');
    }
    
    public function banSeller($id){
        $seller = Sellers::findorFail($id);
        $seller->status = 4;
        $seller->save();
        return redirect()->route('admin.vendedores');
    }

     public function rejectedSeller($id){
        $seller = Sellers::findorFail($id);
        $estado = 'rechazado';
        $user = User::findorFail($seller->user_id)->first();
        $seller->status = 3;
        $seller->save();

        $this->enviar_email_estado($user->name,$estado,$seller->title,$user->email);


        return redirect()->route('admin.vendedores');
    }

    public function enviar_email_estado($nombre,$estado,$vendedor,$email){
        Mail::send('email.status',compact('nombre','estado','vendedor'),function($msj)use($email){
                    $msj->from("tucorreo@ventasuni.com","Equipo de VentasUni");
                    $msj->subject('Estado de tu solicitud de vendedor');
                    $msj->to($email);
                });
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
