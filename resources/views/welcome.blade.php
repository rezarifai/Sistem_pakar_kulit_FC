@extends('layouts.landingpage')

@section('content')
    <section class="bg-gradient-to-b from-blue-100 to-white dark:bg-gray-900 p-5 h-screen flex items-center justify-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <a href="#"
                class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-2 text-sm text-white-700 bg-blue-100 rounded-full dark:bg-yellow-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Baru</span> <span
                    class="text-sm font-medium">Inovasi Teknologi untuk Kesehatan Kulit yang Lebih Baik</span>
                <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const text = "Selamat Datang di Sistem Pakar Diagnosa Penyakit Kulit";
                    const targetElement = document.querySelector('.dynamic-text');
                    let charIndex = 0;

                    function typeChar() {
                        if (charIndex < text.length) {
                            targetElement.innerHTML += text.charAt(charIndex);
                            charIndex++;
                            setTimeout(typeChar,70);
                        }
                    }

                    typeChar();
                });
            </script>
            <h1
                class="dynamic-text mb-4 text-6xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                Sistem ini dirancang untuk membantu Anda mengenali dan mengetahui kemungkinan jenis penyakit kulit berdasarkan gejala yang Anda alami. Dengan teknologi sistem pakar, kami menghadirkan solusi cepat dan akurat sebagai langkah awal sebelum Anda berkonsultasi langsung dengan dokter spesialis.


            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('form.penyakit') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Mulai Konsultasi
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900" id="alurKerja">
        <h1
            class="dynamic-text mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">
            Alur Kerja
        </h1>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-gray-50 hover:bg-blue-200 shadow dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <img src="https://cdn.icon-icons.com/icons2/2407/PNG/512/login_gov_icon_146024.png" width="100"
                        alt="" class="mx-auto">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-bold mt-5 mb-0">Login</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 my-4 text-center">Pengguna harus
                        melakukan login sebelum melangkah ke tahap selanjutnya,dan jika belum memiliki akun akan diarahkan
                        ke menu registrasi</p>
                </div>
                <div
                    class="bg-gray-50  hover:bg-blue-200 dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <img src="https://png.pngtree.com/png-vector/20230228/ourlarge/pngtree-choice-line-icon-vector-png-image_6623901.png"
                        alt="" width="100" class="mx-auto">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-bold mt-5 mb-0">Tabel Gejala Pasien</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 my-4 text-center">Dalam tahap ini
                        pengguna akan diberikan beberapa pertanyaan terkait dengan gejala yang di alami</p>
                </div>
                <div
                    class="bg-gray-50  hover:bg-blue-200 dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <img src="https://cdn-icons-png.flaticon.com/512/9913/9913576.png" alt="" width="100"
                        class="mx-auto">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-bold mt-5 mb-0">Hasil dan Solusi</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 my-4 text-center">Tahap ini merupakan
                        tahap akhir dimana setelah melakukan test gejala pengguna akan diberikan hasil test berupa nama
                        penyakit dan solusinya</p>
                </div>
            </div>
        </div>
    </section>

    <div class="py-8 px-4 mb-4 mx-auto max-w-screen-xl lg:py-16" id="t">
        <h1
            class="dynamic-text mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">
            Tentang kami</h1>
        <p class="mb-8 text-lg font-normal text-center text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
            Penelitian yang berdedikasi dalam mengembangkan solusi teknologi untuk mendukung kesehatan, khususnya melalui penerapan sistem pakar di bidang diagnosis penyakit kulit. Sistem pakar yang kami kembangkan menggunakan metode forward chaining yang memungkinkan pengguna untuk mendapatkan diagnosis awal berdasarkan gejala yang mereka alami. Sistem ini bertujuan mempermudah masyarakat dalam mendapatkan informasi kesehatan kulit secara cepat dan efisien tanpa harus langsung menemui tenaga medis.
        </p>
    </div>
    </div>

    </section>

    <footer class="bg-gradient-to-b from-blue-100 to-white text-dark py-3">
        <div class="container mx-auto px-2">
            <div class="flex justify-center items-center h-full text-center">
                <div>
                    <h2 class="text-lg font-semibold mb-4">Fida Rezaldi Rifai - 203200165 ©Copyright</h2>
                </div>
            </div>  
        </div>        
    </footer>


@endsection
