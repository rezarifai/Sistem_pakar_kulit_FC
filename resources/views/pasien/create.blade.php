@extends('layouts.dashboard')
@section('title','Data Pasien')
@section('content')
   <div class="col-md-6 p-3">
    <form action="{{route('pasiens.store')}}" method="post">
        @csrf
        <input type="text" name="nama" placeholder="nama" class="form-control mb-3" id="">
        <input type="email" name="email" placeholder="email" class="form-control mb-3" id="">
        <input type="text" name="alamat" placeholder="alamat" class="form-control mb-3" id="">
        <input type="text" name="no_telepon" placeholder="no_telepon" class="form-control mb-3" id="">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
   </div>
@endsection