<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
	protected $fillable = [
		'sellers_id','title','pricing'
	];

    public function seller()
    {
        return $this->belongsTo('App\Sellers');
    }
}
