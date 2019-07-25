<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Sellers;
use App\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => 'centro']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    public function centro($centro,Request $request){

        switch ($centro) {
            case 'cutonala':
                $centro = 'CENTRO UNIVERSITARIO DE TONALA';
                break;
             case 'cucei':
                $centro = 'CENTRO UNIVERSITARIO DE CIENCIAS EXACTAS E INGENIERIAS';
                break;
             case 'cucea':
                $centro = 'CENTRO UNIVERSITARIO DE CIENCIAS ECONOMICO-ADMINISTRATIVAS';
                break;
             case 'cucsh':
                $centro = 'CENTRO UNIVERSITARIO DE CIENCIAS SOCIALES Y HUMANIDADES';
                break;
                
        }
        if($request->busqueda){$busqueda = true;}else{$busqueda = false;}



        $sellers = Sellers::where('school','=',$centro)->get();
        $categories = Categories::paginate(6);
        $salados = Sellers::where('school','=',$centro)->where("category",'=','comida')->get();
        $salados = Sellers::where('school','=',$centro)->where("category",'=','comida')->get();
        $dulces = Sellers::where('school','=',$centro)->where('category','=','postres')->get();
        $bebidas = Sellers::where('school','=',$centro)->where('category','=','bebidas')->get();

        return view('welcome')->with(compact('sellers','salados','dulces','bebidas','categories','busqueda','centro'));
    }

    public function welcome(Request $request){
        if($request->busqueda){$busqueda = true;}else{$busqueda = false;}

        
        $sellers = Sellers::Search($request->get("busqueda"));
        $categories = Categories::paginate(6);
        $salados = Sellers::where("category",'=','comida')->inRandomOrder()->limit(4)->get();
        $dulces = Sellers::where('category','=','postres')->get();
        $bebidas = Sellers::where('category','=','bebidas')->get();
        return view('welcome')->with(compact('sellers','salados','dulces','bebidas','categories','busqueda'));

    }
    public function busqueda(){
        return view('busqueda');
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
}
