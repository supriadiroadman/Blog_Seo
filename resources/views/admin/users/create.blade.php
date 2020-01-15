@extends('backend.master')
@section('title', 'Tambah User')

@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tipe</label>
                        <select class="form-control" name="user_type">
                            <option value="">Pilih</option>
                            <option value="1">Administrator</option>
                            <option value="0">Author</option>
                        </select>
                        @error('user_type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
                        @error('password')
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
