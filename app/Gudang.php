<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $fillable = [
    	'product_id',
    	'user_id',
    	'jumlah',
    	'keterangan',
    	'tgl_input',
    	'status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
