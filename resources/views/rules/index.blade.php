@extends('layouts.dashboard')
@section('title','Data Aturan')
@section('content')
   <div class="card shadow border-0">
    <div class="card-body">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Penyakit</th>
                    <th>Gejala</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penyakit as $penyakit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penyakit->nama_penyakit }} - <span class="text-danger font-weight-bold">{{$penyakit->kode_penyakit}}</span></td>
                    <td>
                        <ul>
                          @foreach($penyakit->gejalas as $gejala)
                            <li>{{ $gejala->nama_gejala }} - <span class="text-danger font-weight-bold">{{$gejala->kode_gejala}}</span></li>
                          @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('rules.edit', $penyakit->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
   </div>
@endsection
