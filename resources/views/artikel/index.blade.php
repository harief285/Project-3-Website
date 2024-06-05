@extends('layouts.appdashboard')
@section('Section', 'Artikel')

<title>@yield('title', 'Deteksi Wajah | Artikel')</title>

@section('content')
    <main class="main" id="main">
        <section class="main">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Artikel</div>

                            <div class="card-body">
                                <a href="{{ route('buat.artikel') }}" class="btn btn-primary mb-3">Buat Artikel Baru</a>

                                @if ($articles->count() > 0)
                                    <ul class="list-group">
                                        @foreach ($articles as $article)
                                            <li class="list-group-item">
                                                <h5>{{ $article->judul }}</h5>
                                                <p>Oleh: {{ $article->user->name }} |
                                                    {{ $article->created_at->format('d M Y') }}</p>
                                                <a href="{{ route('artikel.show', $article->id) }}"
                                                    class="btn btn-primary btn-sm">Lihat</a>
                                                <a href="{{ route('artikel.edit', $article->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>
                                                <form action="{{ route('artikel.delete', $article->id) }}" method="POST"
                                                    class="d-inline form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-delete">Hapus</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada artikel.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = button.closest('form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda tidak akan dapat mengembalikan ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
