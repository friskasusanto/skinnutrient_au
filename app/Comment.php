<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'status', 'comment', 'parent', 'child', 'name', 'email', 'judul', 'blog_id'

    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }
}
