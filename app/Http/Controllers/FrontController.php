<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $resentPost = Post::orderBy('created_at', 'desc')->take(8)->get();
        return view('guest.index', compact('resentPost'));
    }

    public function articles($slug)
    {
        $posts =  Post::whereSlug($slug)->get();
        return view('guest.blog', compact('posts'));
    }
}
