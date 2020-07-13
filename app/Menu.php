<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'name', 'status'
    ];

    public function category()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
}
