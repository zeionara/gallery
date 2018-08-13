<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable as Authenticable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Movie extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'movies';

    protected $fillable = [
	'title', 'rating', 'poster'
    ];
}
