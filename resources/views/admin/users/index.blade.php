@extends('backend.master')
@section('title', 'Users')

@section('content')
<div class="card">

    @if(session()->has('pesan'))
    <div class="alert alert-light alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success</div>
            {{ session()->get('pesan') }}.
        </div>
    </div>
    @endif

    <div class="card-body">

        <div class="section-title mt-0">
            User
            <a href="{{ route('users.create') }}" class="btn btn-primary float-right mb-3">Tambah</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key => $user)
                <tr>
                    <th scope="row">{{ $users->firstItem() + $key}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->user_type)
                        <span class="badge badge-secondary">Admin</span>
                        @else
                        <span class="badge badge-light">Author</span>
                        @endif
                    </td>

                    <td class="d-flex align-items-center    ">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin akan dihapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <h3>Tidak ada data...</h3>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

{{ $users->links() }}
@endsection
