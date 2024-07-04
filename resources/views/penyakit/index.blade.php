@extends('layouts.dashboard')
@section('title','Data Penyakit')
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
    <div class="col-md-3">
        <a href="{{ route('penyakit.create') }}" class="btn btn-primary mb-3">
            Tambah
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Penyebab</th>
                <th>Solusi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($penyakit as $item)
           <tr>
            <td>{{ $item->kode_penyakit }}</td>
            <td>{{ $item->nama_penyakit }}</td>
            <td>{{ $item->penyebab }}</td>
            <td>{{ $item->solusi }}</td>
            <td>
                @if($item->gambar)
                    <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama_penyakit }}" width="100">
                @else
                    Tidak ada gambar
                @endif
            </td>
            <td>
               <div class="d-flex">
                <a href="{{ route('penyakit.edit', ['penyakit' => $item->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('penyakit.destroy', ['penyakit' => $item->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?')">Hapus</button>
               </div>
                </form>
            </td>
        </tr>
           @endforeach
        </tbody>
    </table>
   </div>
@endsection
