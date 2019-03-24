<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $fillable = [ 'sellers_id','day','start_hour','finish_hour' ];
    protected $hidden = [
        'sellers_id'
    ];

    public function seller()
    {
        return $this->belongsTo('App\Sellers');
    }
}
