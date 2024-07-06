@extends('layouts.landingpage')

@section('content')
<section class="bg-gradient-to-b from-blue-100 to-white dark:bg-gray-900 p-5 h-screen flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden w-full max-w-6xl mt-10 ">
        <div class="p-5 ">
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400 dark:border-yellow-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Informasi:</span> Pilih "Ya" jika Anda mengalami gejala ini, dan "Tidak" jika tidak.
                </div>
            </div>
            
            <div class="flex justify-between items-center">
                <div class="text-gray-500 dark:text-gray-400">
                    Pertanyaan {{ $index_gejala }} dari {{ $total_gejala }}
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row items-center md:items-start md:h-70vh p-10">
                <div class="md:w-1/2 md:text-left text-center md:pl-12 mb-8 md:mb-0">
                    <span class="font-semibold text-base md:text-3xl mb-2">Apakah Anda Mengalami Gejala Ini?</span>
                    <span class="text-base fw-semibold text-red-500">{{ $gejala->kode_gejala }}</span>
                    <h1 class="font-bold text-5xl md:text-5xl mb-5">{{ $gejala->nama_gejala }}</h1>

                    <div class="flex justify-center mt-5-4 gap-4">
                        <form action="{{ route('next.gejala') }}" method="POST">
                            @csrf
                            <input type="hidden" name="gejala_id" value="{{ $gejala->id }}">
                            <input type="hidden" name="jawaban" value="ya">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-20 py-3 mt-10 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-base">
                                <i class="bi bi-check-circle-fill me-2"></i> Ya
                            </button>
                        </form>
                        <form action="{{ route('next.gejala') }}" method="POST">
                            @csrf
                            <input type="hidden" name="gejala_id" value="{{ $gejala->id }}">
                            <input type="hidden" name="jawaban" value="tidak">
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-20 py-3 text-base text-center mt-10 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="bi bi-x-circle-fill me-2"></i> Tidak
                            </button>
                        </form>
                    </div>
                </div>
                <div class="md:w-1/2 md:text-center items-center">
                    <img src="{{ asset('storage/' . $gejala->gambar) }}" alt="{{ $gejala->nama_gejala }}" class="mx-auto rounded-lg mt-5 md:mt-0">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
