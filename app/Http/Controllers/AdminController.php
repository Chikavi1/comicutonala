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
    public function index(Request $request)
    {
       
        return view('admin.index');
    }
    public function login(Request $request){
        $correo = $request->codigo;
        $password = $request->nip;
        if($correo == "chikavi@hotmail.com" && $password == "zeissps310"){
            return view('admin.index');
        }
    }
    public function vendedores()
    {
        $sellers = Sellers::paginate(15);
        return view('admin.vendedores')->with(compact('sellers'));
    }
    public function categorias(){
        $categories = Categories::all();
        return view('admin.categorias')->with(compact("categories")); 
    }
    public function usuarios(){
        $users = User::paginate(15);
        return view('admin.usuarios')->with(compact('users'));
    }
    public function estadisticas(){
        return view('admin.estadisticas');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
