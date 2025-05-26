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
    <table class="table table-bordered table-striped" id="table1">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Tanggal Diagnosa</th>
                <th>Nama Penyakit</th>
                <th>Gejala yang Dipilih</th> 
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
                        @php
    $gejalaTerpilih = json_decode($diagnosesByUser->first()->gejala_terpilih, true);
    $gejalaIds = collect($gejalaTerpilih)
                    ->where('jawaban', 'ya')
                    ->pluck('id')
                    ->unique()
                    ->toArray();

    // Ambil data nama gejala dari database berdasarkan ID
    $gejalas = \App\Models\Gejala::whereIn('id', $gejalaIds)->pluck('nama_gejala', 'id');
@endphp

<td>
    <ul>
        @foreach ($gejalaIds as $id)
            <li>{{ $gejalas[$id] ?? 'Gejala tidak ditemukan' }}</li>
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
