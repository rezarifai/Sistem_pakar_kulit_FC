@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Edit Penyakit</h1>
        <form action="{{ route('penyakit.update', ['penyakit' => $penyakit->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode penyakit">kode penyakit</label>
                <input type="text" name="kode_penyakit" class="form-control" value="{{ $penyakit->kode_penyakit }}">
            </div>
            <div class="form-group">
                <label for="nama penyakit">nama penyakit</label>
                <input type="text" name="nama_penyakit" class="form-control" value="{{ $penyakit->nama_penyakit }}">
            </div>
            <div class="form-group">
                <label for="penyebab">penyebab</label>
                <input type="text" name="penyebab" class="form-control" value="{{ $penyakit->penyebab }}">
            </div>
            <div class="form-group">
                <label for="solusi">solusi</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $penyakit->solusi }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
