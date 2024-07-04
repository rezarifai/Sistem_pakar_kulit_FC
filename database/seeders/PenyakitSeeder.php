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
                'kode_penyakit' => 'PK001',
                'nama_penyakit' => 'Dermatitis Kontak',
                'penyebab' => 'Kontak dengan alergen atau iritan',
                'solusi' => 'Hindari kontak dengan pencetus, gunakan krim atau salep antiinflamasi',
            ],
            [
                'kode_penyakit' => 'PK002',
                'nama_penyakit' => 'Jerawat',
                'penyebab' => 'Kelenjar minyak yang tersumbat',
                'solusi' => 'Perawatan kulit yang teratur, penggunaan obat topikal',
            ],
            [
                'kode_penyakit' => 'PK003',
                'nama_penyakit' => 'Eksim',
                'penyebab' => 'Reaksi alergi atau iritasi kulit',
                'solusi' => 'Penggunaan krim kortikosteroid, hindari pencetus',
            ],
            [
                'kode_penyakit' => 'PK004',
                'nama_penyakit' => 'Psoriasis',
                'penyebab' => 'Kelainan autoimun yang menyebabkan percepatan pertumbuhan sel kulit',
                'solusi' => 'Terapi cahaya, penggunaan krim atau salep medis',
            ],
            [
                'kode_penyakit' => 'PK005',
                'nama_penyakit' => 'Kudis',
                'penyebab' => 'Infeksi parasit kutu',
                'solusi' => 'Pengobatan dengan salep atau obat antiparasit',
            ],
            [
                'kode_penyakit' => 'PK006',
                'nama_penyakit' => 'Herpes Zoster',
                'penyebab' => 'Virus Varicella-zoster',
                'solusi' => 'Terapi antiviral, obat pereda nyeri',
            ],
            [
                'kode_penyakit' => 'PK007',
                'nama_penyakit' => 'Kutil',
                'penyebab' => 'Infeksi virus HPV',
                'solusi' => 'Pengobatan dengan obat topikal, krioterapi, atau pembedahan',
            ],
            [
                'kode_penyakit' => 'PK008',
                'nama_penyakit' => 'Panu',
                'penyebab' => 'Infeksi jamur',
                'solusi' => 'Penggunaan krim atau salep antijamur, menjaga kebersihan kulit',
            ],
            [
                'kode_penyakit' => 'PK009',
                'nama_penyakit' => 'Urtikaria',
                'penyebab' => 'Reaksi alergi atau infeksi',
                'solusi' => 'Penggunaan antihistamin, hindari pencetus',
            ],
            [
                'kode_penyakit' => 'PK010',
                'nama_penyakit' => 'Lichen Planus',
                'penyebab' => 'Penyebabnya belum diketahui dengan pasti',
                'solusi' => 'Penggunaan krim kortikosteroid, obat antihistamin',
            ],
        ];

        // Masukkan data penyakit kulit ke dalam tabel penyakit
        foreach ($penyakitKulit as $item) {
            Penyakit::create($item);
        }
    }
}
