@extends('layouts.dashboard')
@section('title', 'Riwayat Diagnosa')
@section('content')
<div class="card p-3 shadow border-0">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($riwayatDiagnosa->isEmpty())
    <p>Tidak ada riwayat diagnosa.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Diagnosa</th>
                <th>Nama Penyakit</th>
                <!-- Tambahkan kolom-kolom lain yang Anda ingin tampilkan -->
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatDiagnosa as $diagnosa)
            <tr>
                <td>{{ $diagnosa->user->name }}</td>
                <td>{{ $diagnosa->created_at }}</td>
                <td>{{ $diagnosa->penyakit->nama_penyakit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
