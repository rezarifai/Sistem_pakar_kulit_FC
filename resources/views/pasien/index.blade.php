@extends('layouts.dashboard')
@section('title','Data Pasien')
@section('content')
   <div class="card shadow border-0">
   <div class="card-body">
    <a href="{{ route('pdf') }}" class="btn btn-success">Cetak PDF</a>

    <table class="table" id="table1">
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
            <td>{{$item->user->name}}</td>
            <td>{{$item->user->email}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->no_telepon}}</td>
            <td>
                <div class="d-flex">
                <a href="{{ route('pasiens.edit', ['pasien' => $item->id]) }}" class="btn btn-success">Edit</a>
            <form action="{{ route('pasiens.destroy', ['pasien' => $item->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Hapus</button>
            </form>
                </div>
            </td>
        </tr>
           @endforeach
        </tbody>
    </table>
   </div>

   </div>
@endsection