@extends('layouts.landingpage')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="fw-bold text-center mb-4">Hasil Diagnosa</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-3 mb-md-0">
                @if($penyakitTerbesar)
                    <img src="{{ asset('storage/' . $penyakitTerbesar['gambar']) }}" alt="{{ $penyakitTerbesar['nama'] }}" class="img-fluid mb-3" style="max-height: 200px;">
                @else
                    <p class="text-muted">Gambar tidak tersedia</p>
                @endif
            </div>
            <div class="col-md-8">
                @if($penyakitTerbesar)
                    <div class="result-card mb-4">
                        <h3 class="text-primary">{{ $penyakitTerbesar['nama'] }}</h3>
                        <p><strong>Kode Penyakit:</strong> {{ $penyakitTerbesar['kode'] }}</p>
                        <p><strong>Penyebab:</strong> {{ $penyakitTerbesar['penyebab'] }}</p>
                        <p><strong>Solusi:</strong> {{ $penyakitTerbesar['solusi'] }}</p>
                        <p><strong>Persentase Kemungkinan:</strong> 
                            <span class="badge bg-success">{{ round($penyakitTerbesar['persentase'], 2) }}%</span>
                        </p>
                        <div class=" mt-5">
                            <a href="{{ route('form.diagnosa') }}" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Diagnosa Ulang</a>
                        </div>
                    </div>
                @else
                    <p class="text-center">Tidak ada penyakit yang teridentifikasi berdasarkan gejala yang dipilih.</p>
                @endif
                
            </div>
            
        </div>

        <h4 class="mt-4"><i class="bi bi-list-check text-primary"></i> Gejala yang Dipilih:</h4>
        <ul class="list-group">
            @foreach($selectedSymptoms as $gejala)
                <li class="list-group-item"><i class="bi bi-check-circle-fill text-success"></i> {{ $gejala->nama_gejala }}</li>
            @endforeach
        </ul>

     
    </div>
</div>
@endsection
