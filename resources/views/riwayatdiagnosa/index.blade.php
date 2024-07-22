@extends('layouts.dashboard')
@section('title', 'Riwayat Diagnosa')
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

    @if($riwayatDiagnosa->isEmpty())
    <p>Tidak ada riwayat diagnosa.</p>
    @else
    <table class="table table-bordered" id="table1">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Diagnosa</th>
                <th>Nama Penyakit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayatDiagnosa as $date => $diagnosesByDate)
                @foreach($diagnosesByDate as $userId => $diagnosesByUser)
                    <tr>
                        <td>{{ $diagnosesByUser->first()->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($date)->format('d M Y ') }}</td>
                        <td>
                            <ul>
                                @foreach($diagnosesByUser as $d)
                                    <li>{{ $d->penyakit->nama_penyakit }} - {{ $d->persentase }}%</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
