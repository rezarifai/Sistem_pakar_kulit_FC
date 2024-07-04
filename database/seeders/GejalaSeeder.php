<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gejalaPenyakitKulit = [
            [
                'kode_gejala' => 'GK001',
                'nama_gejala' => 'Ruam merah pada kulit',
            ],
            [
                'kode_gejala' => 'GK002',
                'nama_gejala' => 'Gatal-gatal pada area tertentu',
            ],
            [
                'kode_gejala' => 'GK003',
                'nama_gejala' => 'Bengkak atau kemerahan pada kulit',
            ],
            [
                'kode_gejala' => 'GK004',
                'nama_gejala' => 'Kulit mengelupas',
            ],
            [
                'kode_gejala' => 'GK005',
                'nama_gejala' => 'Noda atau bintik-bintik pada kulit',
            ],
            [
                'kode_gejala' => 'GK006',
                'nama_gejala' => 'Kulit kering dan pecah-pecah',
            ],
            [
                'kode_gejala' => 'GK007',
                'nama_gejala' => 'Muncul benjolan atau tonjolan pada kulit',
            ],
            [
                'kode_gejala' => 'GK008',
                'nama_gejala' => 'Rasa terbakar atau panas pada kulit',
            ],
            [
                'kode_gejala' => 'GK009',
                'nama_gejala' => 'Timbul vesikel atau gelembung air pada kulit',
            ],
            [
                'kode_gejala' => 'GK010',
                'nama_gejala' => 'Kulit bersisik',
            ],
            [
                'kode_gejala' => 'GK011',
                'nama_gejala' => 'Kemerahan yang disertai rasa nyeri',
            ],
            [
                'kode_gejala' => 'GK012',
                'nama_gejala' => 'Kulit mengeras',
            ],
            [
                'kode_gejala' => 'GK013',
                'nama_gejala' => 'Kulit melepuh',
            ],
            [
                'kode_gejala' => 'GK014',
                'nama_gejala' => 'Rasa terbakar saat kulit terkena air',
            ],
            [
                'kode_gejala' => 'GK015',
                'nama_gejala' => 'Pembengkakan pada area tertentu',
            ],
            [
                'kode_gejala' => 'GK016',
                'nama_gejala' => 'Perubahan warna kulit',
            ],
            [
                'kode_gejala' => 'GK017',
                'nama_gejala' => 'Timbul lepuhan pada kulit',
            ],
            [
                'kode_gejala' => 'GK018',
                'nama_gejala' => 'Gatal yang parah pada malam hari',
            ],
            [
                'kode_gejala' => 'GK019',
                'nama_gejala' => 'Kulit terasa panas',
            ],
            [
                'kode_gejala' => 'GK020',
                'nama_gejala' => 'Bercak putih pada kulit',
            ],
            [
                'kode_gejala' => 'GK021',
                'nama_gejala' => 'Perubahan tekstur kulit',
            ],
            [
                'kode_gejala' => 'GK022',
                'nama_gejala' => 'Kulit pecah-pecah',
            ],
            [
                'kode_gejala' => 'GK023',
                'nama_gejala' => 'Kulit terasa kaku',
            ],
            [
                'kode_gejala' => 'GK024',
                'nama_gejala' => 'Timbul rasa gatal saat berkeringat',
            ],
            [
                'kode_gejala' => 'GK025',
                'nama_gejala' => 'Kulit bersisik tebal',
            ],
            [
                'kode_gejala' => 'GK026',
                'nama_gejala' => 'Pembengkakan yang meradang pada kulit',
            ],
            [
                'kode_gejala' => 'GK027',
                'nama_gejala' => 'Kulit menjadi kasar',
            ],
            [
                'kode_gejala' => 'GK028',
                'nama_gejala' => 'Noda hitam pada kulit',
            ],
            [
                'kode_gejala' => 'GK029',
                'nama_gejala' => 'Kulit mengeluarkan cairan berwarna',
            ],
            [
                'kode_gejala' => 'GK030',
                'nama_gejala' => 'Kulit terasa kaku dan tebal',
            ],
        ];

        // Masukkan data gejala penyakit kulit ke dalam tabel gejala
        foreach ($gejalaPenyakitKulit as $item) {
            Gejala::create($item);
        }
    }
}
