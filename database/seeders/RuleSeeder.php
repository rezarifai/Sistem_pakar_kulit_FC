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
            [
                'penyakit_kode' => 'P01',
                'gejala_kode' => ['G01', 'G02', 'G03']
            ],
            [
                'penyakit_kode' => 'P02',
                'gejala_kode' => ['G04', 'G05', 'G06']
            ],
            [
                'penyakit_kode' => 'P03',
                'gejala_kode' => ['G07', 'G08', 'G09']
            ],
            [
                'penyakit_kode' => 'P04',
                'gejala_kode' => ['G10', 'G11', 'G12']
            ],
            [
                'penyakit_kode' => 'P05',
                'gejala_kode' => ['G13', 'G14', 'G15']
            ],
            [
                'penyakit_kode' => 'P06',
                'gejala_kode' => ['G16', 'G17', 'G18']
            ],
            [
                'penyakit_kode' => 'P07',
                'gejala_kode' => ['G19', 'G20', 'G21']
            ],
            [
                'penyakit_kode' => 'P08',
                'gejala_kode' => ['G22', 'G23', 'G24']
            ]
        ];

        // Masukkan aturan ke dalam tabel relasi antara penyakit dan gejala
        foreach ($aturan as $item) {
            $penyakit = Penyakit::where('kode_penyakit', $item['penyakit_kode'])->first();
            $gejala_kode = $item['gejala_kode'];
            $gejala = Gejala::whereIn('kode_gejala', $gejala_kode)->get();

            // Mengaitkan gejala dengan penyakit
            $penyakit->gejalas()->attach($gejala);
        }
    }
}
