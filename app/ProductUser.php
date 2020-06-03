<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
    protected $table = 'product_users';

    protected $fillable = [
    	'user_id', 'product_id', 'price_admin', 'price_user', 'category_id', 'status'

    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
