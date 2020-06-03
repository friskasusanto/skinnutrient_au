<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReseller extends Model
{
    protected $table = 'product_resellers';

    protected $fillable = [
    	'user_id', 'product_id', 'jumlah', 'tgl_input'

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
