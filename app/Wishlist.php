<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
    	'user_id', 'product_id', 'jumlah', 'status', 'total_amount', 'category_id'

    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
