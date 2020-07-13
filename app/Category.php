<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'category_name', 'status', 'menu_id'
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
    public function productUser()
    {
        return $this->hasMany('App\ProductUser', 'category_id');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}

