<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sellers;
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
    public function index()
    {
        return view('home');
    }
    public function welcome(){

        $sellers = Sellers::all();
        $salados = Sellers::where("category",'=','comida salada')->get();
        $dulces = Sellers::where('category','=','comida dulce')->get();
        $bebidas = Sellers::where('category','=','bebidas')->get();
        return view('welcome')->with(compact('sellers','salados','dulces','bebidas'));

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
        return view('profile');
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
