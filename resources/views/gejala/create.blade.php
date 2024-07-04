@extends('layouts.dashboard')
@section('title','Data Gejala')
@section('content')
   <div class="col-md-6 p-3">
    <form action="{{ route('gejala.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="kode_gejala">Kode Gejala</label>
            <input type="text" name="kode_gejala" placeholder="Kode Gejala" class="form-control mb-3" required>
        </div>
        <div class="form-group">
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" name="nama_gejala" placeholder="Nama Gejala" class="form-control mb-3" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control-file" id="gambar" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
   </div>
@endsection
