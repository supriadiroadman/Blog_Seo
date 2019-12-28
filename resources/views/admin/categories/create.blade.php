@extends('backend.master')
@section('title', 'Tambah Kategori')

@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
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
