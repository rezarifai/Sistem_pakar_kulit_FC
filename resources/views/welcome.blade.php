@extends('layouts.landingpage')

@section('content')
    <section class="bg-gradient-to-b from-green-100 to-white dark:bg-gray-900 p-5 h-screen flex items-center justify-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <a href="#"
                class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-2 text-sm text-green-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                <span class="text-xs bg-green-600 rounded-full text-white px-4 py-1.5 me-3">Baru</span> <span
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
                            setTimeout(typeChar, 100);
                        }
                    }

                    typeChar();
                });
            </script>
            <h1
                class="dynamic-text mb-4 text-6xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                Kami fokus pada teknologi dan inovasi untuk memberikan nilai jangka panjang serta mendorong pertumbuhan
                ekonomi melalui sistem pakar diagnosa penyakit kulit. Dengan kombinasi keahlian medis dan teknologi, kami
                berkomitmen untuk meningkatkan kualitas hidup Anda.
            </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="{{ route('form.penyakit') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
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
                    class="bg-gray-50 hover:bg-green-200 shadow dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <img src="https://cdn.icon-icons.com/icons2/2407/PNG/512/login_gov_icon_146024.png" width="100"
                        alt="" class="mx-auto">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-bold mt-5 mb-0">Login</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 my-4 text-center">Pengguna harus
                        melakukan login sebelum melangkah ke tahap selanjutnya,dan jika belum memiliki akun akan diarahkan
                        ke menu registrasi</p>
                </div>
                <div
                    class="bg-gray-50  hover:bg-green-200 dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <img src="https://png.pngtree.com/png-vector/20230228/ourlarge/pngtree-choice-line-icon-vector-png-image_6623901.png"
                        alt="" width="100" class="mx-auto">
                    <h2 class="text-gray-900 dark:text-white text-2xl font-bold mt-5 mb-0">Tabel Gejala Pasien</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 my-4 text-center">Dalam tahap ini
                        pengguna akan diberikan beberapa pertanyaan terkait dengan gejala yang di alami</p>
                </div>
                <div
                    class="bg-gray-50  hover:bg-green-200 dark:bg-gray-800 text-center border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
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

    <div class="py-8 px-4 mb-4 mx-auto max-w-screen-xl lg:py-16">
        <h1
            class="dynamic-text mb-4 text-4xl font-bold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white text-center">
            Tentang kami</h1>
        <p class="mb-8 text-lg font-normal text-center text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
            Rumah sakit umum daerah (RSUD) di Kabupaten Bantul. Rumah sakit ini melayani pasien baik dari Kabupaten Bantul maupun dari luar daerah karena merupakan jenis rumah sakit umum. RSUD Panembahan Senopati menerima pasien-pasien untuk disembuhkan dengan dukungan dokter ahli dan perawat berkualitas.
        </p>
    </div>
    </div>

    </section>

    <footer class="bg-gradient-to-b from-green-100 to-white text-dark py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-1/4 text-center mb-6 md:mb-0">
                    <img src="https://seeklogo.com/images/R/rsud-panembahan-senopati-bantul-logo-CFB1993299-seeklogo.com.png" alt="Logo" class="mb-4 md:mx-0" width="100">
                </div>
                <div class="w-1/4 mb-6 md:mb-0">
                    <h2 class="text-lg font-semibold mb-4">Alamat</h2>
                    <p class="text-dark-300">
                        Jl. Dr. Wahidin Sudiro Husodo, Area Sawah,Trirenggo, Kec. Bantul,<br>
                        Kabupaten Bantul, Daerah Istimewa Yogyakarta 55714
                    </p>
                </div>
                <div class="w-1/4 mb-6 md:mb-0">
                    <h2 class="text-lg font-semibold mb-4">Kontak</h2>
                    <p class="text-dark-300">
                        Email: <a href="mailto:info@example.com" class="text-blue-400">rsudps@bantulkab.go.id</a><br>
                        Telepon: <a href="tel:+620000000000" class="text-blue-400">0274 - 367386</a>
                    </p>
                </div>
                <div class="w-1/4">
                    <h2 class="text-lg font-semibold mb-4">Ikuti Kami</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-600 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .592 0 1.325v21.351C0 23.407.592 24 1.325 24H12.82v-9.294H9.691v-3.622h3.129V8.207c0-3.1 1.893-4.788 4.658-4.788 1.325 0 2.464.098 2.797.142v3.24l-1.918.001c-1.504 0-1.794.714-1.794 1.76v2.31h3.588l-.467 3.622h-3.121V24h6.116C23.407 24 24 23.407 24 22.676V1.325C24 .593 23.407 0 22.675 0z"></path></svg>
                        </a>
                        <a href="https://www.instagram.com/rsudps_bantul" class="text-blue-500 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.954 4.569c-.885.392-1.83.654-2.825.775 1.014-.611 1.793-1.574 2.163-2.723-.951.564-2.005.974-3.127 1.195-.896-.954-2.173-1.55-3.594-1.55-2.718 0-4.92 2.203-4.92 4.92 0 .386.044.762.128 1.124-4.09-.205-7.72-2.165-10.148-5.144-.424.726-.666 1.569-.666 2.468 0 1.702.867 3.205 2.186 4.088-.806-.026-1.564-.248-2.228-.616v.062c0 2.377 1.693 4.362 3.946 4.815-.412.112-.847.172-1.294.172-.314 0-.615-.03-.916-.085.617 1.926 2.404 3.33 4.52 3.37-1.655 1.295-3.743 2.068-6.006 2.068-.39 0-.779-.023-1.17-.068 2.14 1.373 4.683 2.175 7.42 2.175 8.907 0 13.785-7.384 13.785-13.785 0-.21 0-.423-.015-.633.944-.68 1.767-1.52 2.415-2.482z"></path></svg>
                        </a>
                        <a href="#" class="text-red-600 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.52 0-10 4.48-10 10 0 4.416 3.14 8.097 7.262 9.368-.1-.777-.2-1.97.04-2.818.21-.732 1.346-4.677 1.346-4.677s-.34-.68-.34-1.682c0-1.576.918-2.752 2.064-2.752.974 0 1.445.732 1.445 1.61 0 .982-.63 2.452-.95 3.806-.27 1.13.56 2.05 1.653 2.05 1.982 0 3.52-2.084 3.52-5.08 0-2.66-1.916-4.537-4.654-4.537-3.17 0-5.036 2.39-5.036 4.85 0 .976.37 2.018.833 2.586.093.112.107.21.08.32-.09.36-.3 1.13-.34 1.286-.05.22-.16.27-.37.17-1.384-.57-2.252-2.346-2.252-3.78 0-3.07 2.37-6.6 6.838-6.6 3.6 0 6.382 2.58 6.382 6.02 0 3.56-2.244 6.4-5.364 6.4-1.046 0-2.03-.58-2.37-1.26 0 0-.57 2.18-.68 2.6-.2.78-.59 1.56-.94 2.18.67.2 1.38.3 2.1.3 5.52 0 10-4.48 10-10 0-5.52-4.48-10-10-10z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>


@endsection
