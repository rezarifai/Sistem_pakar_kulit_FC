@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Edit Pasien</h1>
        <form action="{{ route('pasiens.update', ['pasien' => $pasien->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pasien->nama }}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" value="{{ $pasien->email }}">
            </div>
            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pasien->alamat }}">
            </div>
            <div class="form-group">
                <label for="no_telepon">no telepon</label>
                <input type="number" name="no_telepon" class="form-control" value="{{ $pasien->no_telepon }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
