@extends('frontend.master')

@section('post1')
<!-- post -->
<div class="post post-thumb">
    <a class="post-img" href="blog-post.html"><img src="{{asset('/frontend/img/hot-post-1.jpg')}}" alt=""></a>
    <div class="post-body">
        <div class="post-category">
            <a href="category.html">Lifestyle</a>
        </div>
        <h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo
                periculis ei
                qui</a></h3>
        <ul class="post-meta">
            <li><a href="author.html">John Doe</a></li>
            <li>20 April 2018</li>
        </ul>
    </div>
</div>
<!-- /post -->
@endsection

@section('post2')
<div class="col-md-12">
    <div class="section-title">
        <h2 class="title">Recent posts</h2>
    </div>
</div>
@foreach ($resentPost as $result)

<div class="col-md-6">
    <div class="post">
        <a class="post-img" href="{{ route('articles', $result->slug) }}"><img
                src="{{ asset("storage/uploads/post/$result->gambar") }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="#">{{ $result->category->name }}</a>
            </div>
            <h3 class="post-title"><a href="#">{{ $result->judul }}</a></h3>
            <ul class="post-meta">
                <li><a href="#">{{ $result->user->name }}</a></li>
                <li>{{ $result->created_at->diffForHumans()}}</li>
            </ul>
        </div>
    </div>
</div>

@endforeach
@endsection
