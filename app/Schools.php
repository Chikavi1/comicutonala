<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $fillable = [
        'title', 'slug','location'
    ];
}
