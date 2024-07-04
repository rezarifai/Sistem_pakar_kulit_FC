@extends('layouts.dashboard')
@section('title','Data Aturan')
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
  
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Penyakit</th>
                <th>Gejala</th>
                <th>Action</th> <!-- Tambah kolom untuk tombol edit -->
            </tr>
        </thead>
        <tbody>
            @foreach($penyakit as $penyakit)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penyakit->nama_penyakit }} - <span class="text-danger font-weight-bold">{{$penyakit->kode_penyakit}}</span></td>
                <td>
                    <ul>
                      @foreach($penyakit->gejala as $gejala)
                        <li>{{ $gejala->nama_gejala }} - <span class="text-danger font-weight-bold">{{$gejala->kode_gejala}}</span></li>
                      @endforeach
                    </ul>
                </td>
                <td>
                    <a href="{{ route('rules.edit', $penyakit->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
   </div>
@endsection
