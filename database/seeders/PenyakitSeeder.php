<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penyakitKulit = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Dermatitis Kontak  ',
                'penyebab' => 'Paparan bahan kimia rumah tangga, seperti sabun cuci, deterjen, atau cairan pembersih lainnya',
                'solusi' => 'Pilih sabun hipoalergenik dan bebas alkohol untuk menghindari iritasi lebih lanjut',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => ' Dermatitis Seboroik',
                'penyebab' => 'Produksi minyak (sebum) berlebih pada kulit',
                'solusi' => 'Membersihkan area kulit secara teratur dengan sabun lembut bebas pewangi',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Psoriasis',
                'penyebab' => 'Stres yang berlebihan',
                'solusi' => 'Melakukan manajemen stres seperti meditasi, olahraga ringan, dan tidur cukup',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Impetigo',
                'penyebab' => 'Kebersihan kulit yang tidak terjaga',
                'solusi' => 'Menjaga kebersihan kulit dengan mencuci area tubuh menggunakan sabun antiseptik alami secara teratur',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Varicella',
                'penyebab' => 'Kontak langsung dengan penderita yang sedang terinfeksi',
                'solusi' => 'Melakukan isolasi mandiri dan menjaga kebersihan diri serta lingkungan',
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Herpes Zooster',
                'penyebab' => 'Penurunan daya tahan tubuh (imunitas)',
                'solusi' => 'Meningkatkan daya tahan tubuh melalui pola makan sehat, istirahat cukup, dan manajemen stres',
            ],
            [
                'kode_penyakit' => 'P07',
                'nama_penyakit' => 'Tinea Cruris',
                'penyebab' => 'Kelembapan berlebih di area lipatan kulit',
                'solusi' => 'Menjaga kebersihan dan kekeringan area selangkangan',
            ],
            [
                'kode_penyakit' => 'P08',
                'nama_penyakit' => 'Acne Vulgaris',
                'penyebab' => 'Produksi sebum berlebih akibat stres psikologis',
                'solusi' => 'Manajemen stres melalui teknik relaksasi',
            ],
            [
                'kode_penyakit' => 'P09',
                'nama_penyakit' => 'Vitiligo',
                'penyebab' => 'Stres emosional yang berat',
                'solusi' => 'Manajemen stres',
            ],
            [
                'kode_penyakit' => 'P10',
                'nama_penyakit' => 'Alergic Urticaria',
                'penyebab' => 'Beberapa jenis makanan seperti makanan laut, kacang-kacangan, telur, atau bahan tambahan makanan (misalnya pewarna dan pengawet)',
                'solusi' => 'Menghindari makanan atau zat yang menjadi pemicu urtikaria',
            ],
        ];

        // Masukkan data penyakit kulit ke dalam tabel penyakit
        foreach ($penyakitKulit as $item) {
            Penyakit::create($item);
        }
    }
}
