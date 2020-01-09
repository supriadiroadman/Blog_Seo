@extends('backend.master')
@section('title', 'Tambah Post')

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
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                            value="{{old('judul')}}">
                        @error('judul')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="category_id">
                            <option disabled>Pilih Kategori</option>
                            @forelse ($categories as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                            @empty
                            <option>Tidak ada data</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih</label>
                        <select class="form-control select2" multiple="multiple" name="tags[]">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ collect(old('tags'))->contains($tag->id) ? 'selected':'' }}>
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('tags')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control @error('konten') is-invalid @enderror" name="konten" rows="3"> {{old('konten')}}
                        </textarea>
                        @error('konten')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input class="form-control-file" type="file" name="gambar">
                        @error('gambar')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @endsection
