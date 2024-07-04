@extends('layouts.dashboard')
@section('title','Data Pasien')
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

    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($pasiens as $item)
           <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->no_telepon}}</td>
            <td>
                <a href="{{ route('pasiens.edit', ['pasien' => $item->id]) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('pasiens.destroy', ['pasien' => $item->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Hapus</button>
            </form>
            </td>
        </tr>
           @endforeach
        </tbody>
    </table>
   </div>
@endsection