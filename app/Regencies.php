<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    protected $table = 'regencies';

    protected $fillable = [
    	'id', 'name', 'province_id'

    ];

    public function provinces()
    {
        return $this->belongsTo('App\Provinces', 'province_id');
    }
}
