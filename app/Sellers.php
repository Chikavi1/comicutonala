<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    const PUBLICADO = 1;
    const PENDIENTE = 2;
    const RECHEZADO = 3;
    const BLOQUEADO = 4;


    protected $table = 'sellers';

	  protected $fillable = [
       'user_id', 'title','image', 'slug','description','category','cellphone','salon','available','schedule','school','status'
    ];
    protected $hidden = [
        'user_id',
    ];
   public function items(){
   	return $this->hasMany('App\items');
   }
   public function Schedules(){
    return $this->hasMany('App\Schedules');
   }
   public function user(){
        return $this->belongsTo('App\User');
    }
    public function scopeSearch($query,$title){
        
          return $query->where('title','LIKE',"%$title%")
          ->orWhere('description','LIKE',"%$title%")
          ->orWhere('category','LIKE',"%$title%")->limit(4)->get();
       
    }
    public function scopeSearchAdvanced($query,$titulo,$centro,$categoria){
        
          return $query->where('title','LIKe',"%$titulo%")
          ->where('school',$centro)
          ->where('category',$categoria)->limit(5)->get();
       
    }
}
