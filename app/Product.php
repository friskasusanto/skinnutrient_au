<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'category_id', 'price', 'image', 'description', 'stock', 'min_price', 'max_price', 'status'

    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist', 'product_id');
    }
    public function product_image()
    {
        return $this->hasMany('App\ProductGambar', 'product_id');
    }
    public function productUser()
    {
        return $this->hasMany('App\ProductUser', 'product_id');
    }
    public function productReseller()
    {
        return $this->hasMany('App\ProductReseller', 'product_id');
    }
    public function rating()
    {
        return $this->belongsTo('App\Rating', 'product_id');
    }
}
