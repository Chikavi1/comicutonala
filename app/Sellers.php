<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
	  protected $fillable = [
       'user_id', 'title','image', 'slug','description','category','cellphone','salon','available','schedule','school'
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
}
