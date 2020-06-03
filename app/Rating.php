<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
    	'product_id', 'user_id', 'jumlah'

    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
