@extends('layouts.appdashboard')
@section('Section', 'Artikel')

<title>@yield('title', 'Deteksi Wajah | Artikel')</title>
@section('content')
    <main class="main" id="main">
        <section class="main">
            <div class="container mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1>{{ $article->judul }}</h1>
                        <small>Oleh: {{ $article->user->name }} | Dipublikasikan pada:
                            {{ $article->created_at->format('d M Y') }}</small>
                    </div>
                    <div class="card-body">
                        @if ($article->gambar)
                            <div class="mb-4 text-center">
                                <img src="{{ asset('images/' . $article->gambar) }}" alt="{{ $article->judul }}"
                                    class="img-fluid rounded">
                            </div>
                        @endif
                        <p>{{ $article->isi }}</p>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali ke Daftar Artikel</a>
                </div>
            </div>
        </section>
    </main>
@endsection
