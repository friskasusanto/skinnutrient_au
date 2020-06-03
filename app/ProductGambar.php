<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGambar extends Model
{
    protected $table = 'product_gambars';

    protected $fillable = [
    	'product_id', 'image'

    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
    
}
