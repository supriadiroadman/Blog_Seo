<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Facade\FlareClient\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'konten' => 'required',
            'gambar' => 'required',
            'tags' => 'required',
        ]);

        $gambar = $request->gambar;
        $new_gambar = time() . "-" . $gambar->getClientOriginalName();
        $validateData['gambar'] = $new_gambar;
        $validateData['slug'] = Str::slug($request->judul);

        $gambar->storeAs('public/uploads/post', $new_gambar);

        // dd($validateData);
        $post = Post::create($validateData);

        $post->tags()->attach($request->tags);


        return redirect()->route('posts.index')->with('pesan', "{$validateData['judul']} berhasil ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validasi form
        $validateData = $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'konten' => 'required',
        ]);

        // Untuk slug
        $validateData['slug'] = Str::slug($request->judul);

        // Jika ganti gambar
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama dari storage
            $image_path = "storage/uploads/post/" . $post->gambar;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            // Update gambar baru
            $new_gambar = time() . "-" . $request->gambar->getClientOriginalName();
            $validateData['gambar'] = $new_gambar;
            $request->gambar->storeAs('public/uploads/post', $new_gambar);
        }

        // Update ke tabel post
        $post->update($validateData);

        // Update ke tabel pivot ( post_tag )
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.index')->with('pesan', "{$validateData['judul']} berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Hapus dengan softDeletes
        $post->delete();
        return redirect()->route('posts.trash')->with('pesan', "$post->judul berhasil ditrash");
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(5);
        return view('admin.posts.trashed', compact('posts'));
    }

    public function restore($id)
    {  
        // Post::withTrashed()->whereId($id)->restore();
        $post= Post::withTrashed()->whereId($id)->first();
        $post->restore();
        return redirect()->route('posts.index')->with('pesan', "$post->judul berhasil direstore");
    }

    public function forcedelete($id)
    {
       $post= Post::withTrashed()->whereId($id)->first();
       $post->forceDelete();
       return redirect()->route('posts.trash')->with('pesan', "$post->judul berhasil dihapus");

    }
}
