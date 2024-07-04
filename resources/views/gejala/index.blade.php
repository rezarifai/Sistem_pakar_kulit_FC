@extends('layouts.dashboard')
@section('title','Data Gejala')
@section('content')

   <div class="card p-3">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="col-md-3">

        <a href="{{route('gejala.create')}}" class="btn btn-primary mb-3">
            Tambah
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>kode gejala</th>
                <th>Nama gejala</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gejala as $item)
            <tr>
                <td>{{$item->kode_gejala}}</td>
                <td>{{$item->nama_gejala}}</td>
                <td>
                    <a href="{{ route('gejala.edit', ['gejala' => $item->id]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('gejala.destroy', ['gejala' => $item->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gejala ini?')">Hapus</button>
            </form>
                </tr>
            @endforeach
       
        </tbody>
    </table>
   </div>
@endsection