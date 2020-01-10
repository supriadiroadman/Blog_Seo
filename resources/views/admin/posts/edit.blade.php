@extends('backend.master')
@section('title', 'Edit Post')

{{-- Include style dan script yg di push ke master.blade.php --}}
@push('styles')
<link href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

{{-- Content --}}
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            value="{{ $post->judul }}">
                        @error('judul')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="category_id">
                            <option disabled>Pilih Kategori</option>

                            {{-- Jika parent tidak ada (relasi ke kategori dihapus) --}}
                            @if (empty($post->category->id))
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" >
                                {{ $category->name }}</option>
                            @endforeach
                                
                            {{-- Jika parent ada (berelasi ke kategori) --}}
                            @else
                             @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $category->id==$post->category->id ? 'selected': '' }}>
                                {{ $category->name }}</option>
                            @endforeach
                                
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih</label>
                        <select class="form-control select2" multiple="" name="tags[]">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @foreach ($post->tags as $posttag)

                                {{ $tag->id==$posttag->id ? 'selected': '' }}

                                @endforeach>

                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control" name="konten" rows="3">{{ $post->konten }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input class="form-control-file" type="file" name="gambar">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @endsection
