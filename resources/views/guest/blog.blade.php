@extends('frontend.master')

@section('post1')

@foreach ($posts as $post)

<div class="section-row">
    <figure class="pull-right">
        <img src="{{ asset("storage/uploads/post/$post->gambar") }}">
    </figure>
    <h3>{{$post->judul}}</h3>
    <p>{{$post->konten}}</p>

    <div class="post-body">
        <div class="post-category">
            <a href="#">{{$post->category->name}}</a>
        </div>
        <ul class="post-meta">
            <li><a href="#">{{$post->user->name}}</a></li>
            <li>{{$post->created_at->diffForHumans()}}</li>
        </ul>
    </div>

    <div class="section-row">
        <div class="post-tags">
            <ul>
                <li>TAGS:</li>
                @foreach ($post->tags as $tag)
                <li><a href="#">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

@endforeach

@endsection
