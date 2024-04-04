@extends('layouts.appdashboard')
@section('Section', 'Riwayat')

<title>@yield('title', 'Deteksi Wajah | Riwayat')</title>

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Riwayat Pasien</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Riwayat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat</h5>
                            <div class="row">
                                <div class="col text-end">
                                    <a href="{{ route('export-excel') }}" class="btn btn-primary btn-lg">
                                        <i class="bi bi-download bi-lg"></i>
                                    </a>
                                </div>
                            </div>


                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Tekanan Darah</th>
                                        <th scope="col">Kolesterol</th>
                                        <th scope="col">Prediksi</th>
                                        <th scope="col">Presentase</th>
                                        <th scope="col">Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deteksis as $deteksi)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $deteksi->user->name }}</td>
                                            <td>{{ $deteksi->tekanandarah }}</td>
                                            <td>{{ $deteksi->kolesterol }}</td>
                                            <td>{{ $deteksi->prediksi }}</td>
                                            <td>{{ $deteksi->presentase }}</td>
                                            <td><img src="{{ asset('storage/' . $deteksi->gambar) }}"
                                                    alt="{{ $deteksi->name }}" width="100"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
