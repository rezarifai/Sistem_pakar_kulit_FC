<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;
use App\Models\Gejala;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Definisi aturan antara penyakit dan gejala
        $aturan = [
            // Aturan untuk penyakit Flu
            [
                'penyakit_kode' => 'PK001',
                'gejala_kode' => ['GK001', 'GK002', 'GK008'],
            ],
            // Aturan untuk penyakit Jerawat
            [
                'penyakit_kode' => 'PK002',
                'gejala_kode' => ['GK002', 'GK005', 'GK006'],
            ],
            // Aturan untuk penyakit Eksim
            [
                'penyakit_kode' => 'PK003',
                'gejala_kode' => ['GK001', 'GK003', 'GK009'],
            ],
            // Aturan untuk penyakit Psoriasis
            [
                'penyakit_kode' => 'PK004',
                'gejala_kode' => ['GK003', 'GK004', 'GK010'],
            ],
            // Tambahkan aturan untuk penyakit lainnya sesuai kebutuhan
        ];

        // Masukkan aturan ke dalam tabel relasi antara penyakit dan gejala
        foreach ($aturan as $item) {
            $penyakit = Penyakit::where('kode_penyakit', $item['penyakit_kode'])->first();
            $gejala_kode = $item['gejala_kode'];
            $gejala = Gejala::whereIn('kode_gejala', $gejala_kode)->get();

            // Mengaitkan gejala dengan penyakit
            $penyakit->gejala()->attach($gejala);
        }
    }
}
