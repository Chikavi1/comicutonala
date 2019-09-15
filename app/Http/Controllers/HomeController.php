<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Sellers;
use App\Categories;
use Illuminate\Support\Facades\DB;

use Hash;
use validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function bot()
    {
        return view('bot');
    }
    public function terminos()
    {
        return view('terminos');
    }
    public function index()
    {
        $user = Auth::user();
        return view('home')->with(compact('user'));
    }


    public function welcome(Request $request){


        $sellers = Sellers::where('status',1)->inRandomOrder()->limit(4)->get();
        if($request->busqueda){$busqueda = true;$sellers = Sellers::Search($request->get("busqueda"));}else{$busqueda = false;}
        
        $categories = Categories::paginate(6);

        $salados = Sellers::where("category",'=','comida')
        ->where('status',1)->inRandomOrder()->limit(4)->get();

        $dulces = Sellers::where('category','=','postres')
        ->where('status',1)->inRandomOrder()->limit(4)->get();
        $bebidas = Sellers::where('category','=','bebidas')
        ->where('status',1)->inRandomOrder()->limit(4)->get();
        return view('welcome')->with(compact('sellers','salados','dulces','bebidas','categories','busqueda'));

    }
    public function busqueda(Request $request){
        $sellers = [];
        $categorias = Categories::all();
        if(\Request::ajax()){
        $sellers = Sellers::SearchAdvanced($request->titulo,$request->categoria);
          return \Response::json(view('resultado', array('sellers' => $sellers))->render());
            }
        return view('busqueda')->with(compact('sellers','categorias'));
    }
    public function vender(){
        return view('vender');
    }
    public function random()
    {
       $seller =  Sellers::where('available','=','1')->inRandomOrder()->first();
        return view('randomEat')->with(compact('seller'));
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        $sellers = Sellers::where("user_id",Auth::user()->id)->get();
        return view('profile')->with(compact('user','sellers'));
    }


    public function password(){
        return view('user.password');
    }
    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|min:6|max:18|confirmed',
        ];

         $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Los passwords no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];

        $validator = \Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->route('profile.password')->with('success','Checa tus datos y vuelve a intentarlo,recuerda minimo 6 caracteres maximo 18 caracteres');
        }else{
            if(Hash::check($request->mypassword,Auth::user()->password)){
                $user = new User;
                $user->where('id','=',Auth::user()->id)
                    ->update(['password' => bcrypt($request->password)]);
                return redirect('profile')->with('success','Se actualizo la contraseña.');
            }else{
                dd("valio madre raza");
                return redirect()->route('profile.password')->with('message','datos incorrectos');
            }
        }

    }


    public function admin(){
        return view('admin');
    }

    public function editbussiness( ){

    }
    public function search(){
           $category = $request->input('category');

    //now get all user and services in one go without looping using eager loading
    //In your foreach() loop, if you have 1000 users you will make 1000 queries

    $users = User::with('services', function($query) use ($category) {
         $query->where('category', 'LIKE', '%' . $category . '%');
    })->get();
    }



    //-elminar

    public function emailshow(){
        return view('email.nuevovendedor');
    }

    //eliminar-
}
