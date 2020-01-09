<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Post extends Model
{

    protected $fillable = ['judul', 'category_id', 'konten', 'gambar', 'slug'];

    // One To Many
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Many To Many
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
