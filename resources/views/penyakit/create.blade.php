@extends('layouts.dashboard')
@section('title','Data Penyakit')
@section('content')
   <div class="col-md-6 p-3">
    <form action="{{ route('penyakit.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="kode_penyakit" placeholder="Kode Penyakit" class="form-control mb-3" id="">
        <input type="text" name="nama_penyakit" placeholder="Nama Penyakit" class="form-control mb-3" id="">
        <input type="text" name="penyebab" placeholder="Penyebab" class="form-control mb-3" id="">
        <input type="text" name="solusi" placeholder="Solusi" class="form-control mb-3" id="">
        
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
   </div>
@endsection
