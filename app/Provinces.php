<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
    	'id', 'name'

    ];

    public function regencies()
    {
        return $this->hasMany('App\Regencies', 'province_id');
    }
}
