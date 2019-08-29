<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sellers;
use App\Categories;
use App\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
       $this->middleware('auth');
       }

    public function auth(){
      if(
        \Auth::user()->code == "214426868" ||
        \Auth::user()->code == "217727036"  ){
          return true;
       }else{
        return false;
       }
    }
    public function index(Request $request)
    {
      if($this->auth()){
        return view('admin.index');
      }else{
        return view('errors.404');
      }
      
    }

    public function login(Request $request){
        $correo = $request->codigo;
        $password = $request->nip;


        if($request->codigo && $request->nip){
            if($request->codigo == "chikavi" && $request->nip = "chikavi1"){
                \Session::put('admin','1');
            }
        }
        if(\Session::get('admin')){
            return view('admin.index');
        }
    }

    public function vendedores()
    {
        $sellers = Sellers::where('status',1)->paginate(15);

        if($this->auth()){
          return view('admin.vendedores')->with(compact('sellers'));
        }else{
          return view('errors.404');
       }
    }
    public function solicitudVendedores(){
        $sellers = Sellers::where('status',2)->paginate(15);
        if($this->auth()){
        return view('admin.solicitud')->with(compact('sellers'));
        }else{
          return view('errors.404');
       }
    }
    public function bloqueados(){
        $sellers = Sellers::where('status',4)->paginate(15);
         if($this->auth()){
        return view('admin.bloqueados')->with(compact('sellers'));
        }else{
          return view('errors.404');
       }
    }
    public function verificar(){
      $sellers = Sellers::paginate(10);
       if($this->auth()){
        return view('admin.verificar');
        }else{
          return view('errors.404');
       }
    }
    public function categorias(){
        $categories = Categories::all();
         if($this->auth()){
        return view('admin.categorias')->with(compact("categories")); 
        }else{
          return view('errors.404');
       }
    }
    public function usuarios(){
        $users = User::paginate(15);
         if($this->auth()){
        return view('admin.usuarios')->with(compact('users'));
        }else{
          return view('errors.404');
       }
    }
    public function estadisticas(){
       return view('admin.estadisticas');
    }

}
