<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <!-- Tambahkan link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan CSS kustom di sini jika diperlukan */
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5 fw-bold text-center">Hasil Diagnosa</h2>
        <p class="fw-semibold text-center mb-5">Berdasarkan gejala yang Anda pilih,  <span class="text-success">{{Auth::user()->name}}</span> mungkin menderita:</p>
        <div class="row d-flex justify-content-between gap-3">
            <div class="col-md-3">
                <div class="mt-5">
                    <h4>Gejala yang Anda Pilih:</h4>
                    <ul class="">
                        @foreach($selectedSymptoms as $gejala)
                            <li >{{ $gejala->nama_gejala }} ({{ $gejala->kode_gejala }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                @if(count($penyakitMungkin) > 0)
                <div class="list-group card shadow border-0  mt-4">
                    @foreach($penyakitMungkin as $penyakit)
                        <a href="#" class="list-group-item list-group-item-action p-4">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 fw-bold">{{ $penyakit['nama'] }} ({{ $penyakit['kode'] }})</h5>
                                <small>{{ $penyakit['persentase'] }}%</small>
                            </div>
                            <p class="mb-1"><strong>Penyebab:</strong> {{ $penyakit['penyebab'] }}</p>
                            <p class="mb-1"><strong>Solusi:</strong> {{ $penyakit['solusi'] }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="lead mt-4">Tidak ada penyakit yang teridentifikasi berdasarkan gejala yang Anda pilih.</p>
            @endif
            </div>
        </div>
    </div>
</body>
</html>
