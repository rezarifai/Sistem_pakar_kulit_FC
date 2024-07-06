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
                'nama_penyakit' => 'Eksim/Dermatitis  ',
                'penyebab' => 'Kontak dengan alergen atau iritan',
                'solusi' => 'Hindari kontak dengan pencetus, gunakan krim atau salep antiinflamasi',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => ' Impetigo',
                'penyebab' => 'Kelenjar minyak yang tersumbat',
                'solusi' => 'Perawatan kulit yang teratur, penggunaan obat topikal',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Bisul',
                'penyebab' => 'Reaksi alergi atau iritasi kulit',
                'solusi' => 'Penggunaan krim kortikosteroid, hindari pencetus',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Herpes',
                'penyebab' => 'Kelainan autoimun yang menyebabkan percepatan pertumbuhan sel kulit',
                'solusi' => 'Terapi cahaya, penggunaan krim atau salep medis',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Kudis/Scabies',
                'penyebab' => 'Infeksi parasit kutu',
                'solusi' => 'Pengobatan dengan salep atau obat antiparasit',
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Kurap',
                'penyebab' => 'Virus Varicella-zoster',
                'solusi' => 'Terapi antiviral, obat pereda nyeri',
            ],
            [
                'kode_penyakit' => 'P07',
                'nama_penyakit' => 'Jerawat',
                'penyebab' => 'Infeksi virus HPV',
                'solusi' => 'Pengobatan dengan obat topikal, krioterapi, atau pembedahan',
            ],
            [
                'kode_penyakit' => 'P08',
                'nama_penyakit' => 'Vitiligo',
                'penyebab' => 'Infeksi jamur',
                'solusi' => 'Penggunaan krim atau salep antijamur, menjaga kebersihan kulit',
            ],
        ];

        // Masukkan data penyakit kulit ke dalam tabel penyakit
        foreach ($penyakitKulit as $item) {
            Penyakit::create($item);
        }
    }
}
