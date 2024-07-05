@extends('layouts.landingpage')

@section('content')
<section class="bg-gradient-to-b from-blue-100 to-white dark:bg-gray-900 p-5 h-screen flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden w-full max-w-6xl mt-10">
        <div class="p-5">
            <h2 class="font-bold text-center text-3xl md:text-5xl mb-5">Daftar Penyakit</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-center ">
                @foreach($penyakits->chunk(5) as $chunk)
                    <ul class="list-none pl-5 mb-5">
                        @foreach($chunk as $penyakit)
                            <li class="text-lg text-gray-700 dark:text-gray-300 mb-2 flex ">
                                <i class="bi bi-check mr-2 text-green-700 font-bold "></i>
                                {{ $penyakit->kode_penyakit }} - {{ $penyakit->nama_penyakit }}
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('form.diagnosa') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Mulai Konsultasi
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
