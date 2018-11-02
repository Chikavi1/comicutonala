<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
	  protected $fillable = [
       'user_id', 'title', 'slug','description','category','cellphone','salon','available'
    ];
    protected $hidden = [
        'user_id',
    ];
   public function items(){
   	return $this->hasMany('App\items');
   }
   public function user(){
        return $this->belongsTo('App\User');
    }
}
