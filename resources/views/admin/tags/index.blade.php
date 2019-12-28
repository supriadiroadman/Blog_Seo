@extends('backend.master')
@section('title', 'Tags')

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
            Tags
            <a href="{{ route('tags.create') }}" class="btn btn-primary float-right mb-3">Tambah</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Tag</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $key => $tag)
                <tr>
                    <th scope="row">{{ $tags->firstItem() + $key}}</th>
                    <td>{{ $tag->name }}</td>
                    <td class="d-flex align-items-center">
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>

                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
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

{{ $tags->links() }}
@endsection
