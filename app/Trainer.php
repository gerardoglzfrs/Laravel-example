<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name','avatar','description','slug'];

    protected $timestamp = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function pokemons()
    {
        return $this->hasMany('App\Pokemon');
    }
}
