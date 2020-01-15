<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // SoftDeletes
    use SoftDeletes;

    protected $fillable = ['judul', 'category_id', 'konten', 'gambar', 'slug', 'user_id'];

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

    // One To Many
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
