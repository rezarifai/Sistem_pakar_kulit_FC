@extends('layouts.dashboard')
@section('title','Riwayat Diagnosa')
@section('content')
   <div class="col-md-6 p-3">
    <form action="{{route('riwayatdiagnosa.store')}}" method="post">
        @csrf
        <input type="text" name="nama pasien" placeholder="kode penyakit" class="form-control mb-3" id="">
        <input type="text" name="tanggal lahir" placeholder="nama penyakit" class="form-control mb-3" id="">
        <input type="text" name="alamat" placeholder="penyebab" class="form-control mb-3" id="">
        <input type="text" name="jenis kelamin" placeholder="solusi" class="form-control mb-3" id="">
        <input type="text" name="riwayat kesehatan" placeholder="solusi" class="form-control mb-3" id="">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
   </div>
@endsection