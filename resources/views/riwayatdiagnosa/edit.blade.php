@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Edit Riwayat Diagnosa</h1>
        <form action="{{ route('penyakit.update', ['penyakit' => $penyakit->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama pasien">nama pasien</label>
                <input type="text" name="nama_pasien" class="form-control" value="{{ $diagnosas->nama_pasien }}">
            </div>
            <div class="form-group">
                <label for="tanggal lahir">tanggal lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" value="{{ $diagnosas->tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label for="alamat">alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $penyakit->alamat }}">
            </div>
            <div class="form-group">
                <label for="jenis kelamin">jenis kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="{{ $penyakit->jenis_kelamin }}">
            </div>
            <div class="form-group">
                <label for="riwayat kesehatan">riwayat kesehatan</label>
                <input type="text" name="riwayat kesahatan" class="form-control" value="{{ $diagnosa->riwayat_kesehatan }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
