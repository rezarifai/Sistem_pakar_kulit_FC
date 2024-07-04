@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Edit Gejala</h1>
        <form action="{{ route('gejala.update', ['gejala' => $gejala->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_gejala">Kode Gejala</label>
                <input type="text" name="kode_gejala" id="kode_gejala" class="form-control" value="{{ $gejala->kode_gejala }}">
            </div>
            <div class="form-group">
                <label for="nama_gejala">Nama Gejala</label>
                <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" value="{{ $gejala->nama_gejala }}">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar Saat Ini:</label>
                <br>
                @if ($gejala->gambar)
                    <img src="{{ asset('path_to_your_images_directory/' . $gejala->gambar) }}" alt="Gambar Gejala" style="max-width: 200px; max-height: 200px;">
                @else
                    <span>Tidak ada gambar tersedia</span>
                @endif
            </div>
            <div class="form-group">
                <label for="gambar_baru">Pilih Gambar Baru (Opsional)</label>
                <input type="file" name="gambar_baru" class="form-control-file" id="gambar_baru">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
