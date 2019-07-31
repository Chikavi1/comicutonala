<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sellers;
use App\items;

class Apicontroller extends Controller
{
    public function getsellers()
    {
    	$vendedores = Sellers::inRandomOrder()->limit(10)->get();
    	foreach ($vendedores as $vendedor) {
				$vendedor->description = strip_tags($vendedor->description);
				$vendedor->image = collect(explode('/', $vendedor->image))->last();
				$vendedor->image = 'storage/'.$vendedor->image;
			}

			return $vendedores;
    }

    public function getseller()
    {
    	$vendedores = Sellers::inRandomOrder()->limit(1)->get();
    	foreach ($vendedores as $vendedor) {
			$vendedor->description = strip_tags($vendedor->description);
			$vendedor->image = collect(explode('/', $vendedor->image))->last();
			$vendedor->image = 'storage/'.$vendedor->image;
		}

		return $vendedores;
	    }

    public function getbyCategory($category){
    	return Sellers::where("category",'=',$category)->limit(8)->get();
    }

     public function getbyname($title){
    	return Sellers::where('title','LIKE',"%$title%")->limit(3)->get();
    }

    public function allSellers(){
    	return Sellers::all()->count();
    }

    public function getData(  Request $request){
	$seller = Sellers::where('title','=',$request->title)->first();
		if(is_null($seller)){
			$seller = "No se encontró ningún vendedor con ese nombre";
		}else{
			$campo = $request->data;
			$seller = $seller->$campo;
		}
	return $seller;
	}

	public function getProductsbySeller(Request $request){
		$seller = Sellers::where('title','=',$request->title)->first();
		if(is_null($seller)){
			$seller = "No se encontró ningún vendedor con ese nombre";
		}else{
			$id = $seller->id;
			$products = Items::where("sellers_id","=",$id)->limit(8)->get();
			foreach ($products as $product) {
				$product->description = strip_tags($product->description);
				$product->image = collect(explode('/', $product->image))->last();
				$product->image = 'storage/'.$product->image;
			}

			return $products;
		}
	}
}
