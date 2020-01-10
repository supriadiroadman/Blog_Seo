@extends('backend.master')
@section('title', 'Post Trash')

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
            Post
            
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Post</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $key => $post)
                <tr>
                    <th scope="row">{{ $posts->firstItem() + $key}}</th>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->category->name ??'' }}</td>
                    <td>{{ $post->konten }}</td>

                    <td>
                        @foreach ($post->tags as $tag)
                        <div>
                            <span class="badge badge-primary mb-1">{{ $tag->name }}</span>
                        </div>
                        @endforeach
                    </td>

                    <td><img src="{{ asset('storage/uploads/post/'.$post->gambar) }}" class="img-thumbnail"
                            style="width: 100px">
                    </td>
                    <td class="d-flex align-items-center">
                        <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-info btn-sm mr-2">Restore</a>

                        <form action="{{ route('posts.forcedelete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin akan dihapus?');">Hapus</button>
                        </form>
                    </td>
                </tr>

                @empty
                <td>
                    <h3>Tidak ada data...</h3>
                </td>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

{{ $posts->links() }}
@endsection
