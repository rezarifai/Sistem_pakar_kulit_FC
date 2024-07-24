@extends('layouts.landingpage')

@section('content')
<section class="bg-gradient-to-b from-blue-100 to-white dark:bg-gray-900 p-5 flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden w-full max-w-6xl mt-20">
        <div class="p-5">
            <h2 class="font-bold text-center text-3xl md:text-5xl mb-5">Hasil Diagnosa</h2>
            {{-- <div class="user-info mb-5">
                <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Data Diri Pengguna</h3>
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>No Telepon:</strong> {{ $user->phone ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $user->address ?? '-' }}</p>
                <p><strong>Tanggal Diagnosa:</strong> {{ $today }}</p>
            </div> --}}
            @if($penyakitTerbesar && count($penyakitTerbesar) > 0)
                @foreach($penyakitTerbesar as $penyakit)
                <div class="flex flex-col md:flex-row mb-5">
                    <div class="md:w-1/3 mx-auto mb-3 md:mb-0 text-center">
                        <img src="{{ asset('storage/' . $penyakit['gambar']) }}" alt="{{ $penyakit['nama'] }}" class="mb-3 max-h-150px mx-auto">
                    </div>
                    <div class="md:w-2/3">
                        <div class="result-card mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-md">
                            <h3 class="text-primary text-2xl font-semibold">{{ $penyakit['nama'] }}</h3>
                            <p><strong>Kode Penyakit:</strong> {{ $penyakit['kode'] }}</p>
                            <p><strong>Penyebab:</strong> {{ $penyakit['penyebab'] }}</p>
                            <p><strong>Solusi:</strong> {{ $penyakit['solusi'] }}</p>
                            <p><strong>Persentase Kemungkinan:</strong> 
                                <span class="bg-green-500 text-white py-1 px-2 rounded-md">{{ round($penyakit['persentase'], 2) }}%</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center text-xl text-gray-700 dark:text-gray-300">Tidak ada penyakit yang teridentifikasi berdasarkan gejala yang dipilih.</p>
            @endif

            <h4 class="mt-4 text-xl text-gray-700 dark:text-gray-300">
                <i class="bi bi-list-check text-primary"></i> Gejala yang Dipilih:
            </h4>
            <ul class="list-none ml-0">
                @foreach($selectedSymptoms as $gejala)
                    <li class="flex items-center text-green-500">
                        <i class="bi bi-check2-circle mr-2"></i> {{ $gejala->nama_gejala }}
                    </li>
                @endforeach
            </ul>
            
        </div>
        <div class="flex justify-end p-5">
            <a href="/form-diagnosa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Diagnosa Ulang</a>
            <a href="/" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
        </div>
    </div>
</section>
@endsection
