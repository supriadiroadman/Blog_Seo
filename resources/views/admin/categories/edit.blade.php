@extends('backend.master')
@section('title', 'Edit Kategori')

@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') ?? $category->name }}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @endsection
