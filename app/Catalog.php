<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
    	'produk_id',
    	'user_id',
    	'price_user',
    	'date_entry',
    	'status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'produk_id');
    }
}
