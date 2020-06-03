<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
    	'judul', 'text', 'tgl_input', 'status', 'image'

    ];

    public function comment()
    {
        return $this->hasMany('App\Comment', 'blog_id');
    }
}
