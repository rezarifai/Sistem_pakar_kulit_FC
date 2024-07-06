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
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Ada peradangan pada kulit berwarna kemerahan ',
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Terdapat bintik-bintik warna merah',
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Kulit kering dan bersisik  ',
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Bercak kemerahan yang terasa gatal di sekitar mulut dan hidung, tetapi tidak menimbulkan nyeri ',
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Koreng berwarna kuning kecokelatan di sekitar luka ',
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Iritasi pada kulit di sekitar luka ',
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Pembengkakan dan kemerahan',
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Rasa nyeri atau sakit pada area yang terinfeksi ',
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Bernanah atau pus',
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Luka melepuh atau lepuhan ',
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Sensasi Gatal, Terbakar, atau Kesemutan ',
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Pembengkakan dan Kemerahan ',
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Kulit terasa gatal ',
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Ruam Berbentuk Garis atau Gelembung',
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'PKulit kering dan berkerak ',
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Ruam Merah Berbentuk Cincin ',
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Deskuamasi dan Penebalan Kulit ',
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Kulit Pecah-pecah atau Mengelupas ',
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Papula,benjolan kecil kemerahan yang biasanya terasa nyeri ',
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Pastula,benjolan kecil yang diujungnya terdapat Kumpulan nanah berwarna putih kekuningan',
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Nodul,benjolan cukup besar dibawah kulit yang teraba padat dan terasa nyeri ',
            ],
            [
                'kode_gejala' => 'G22',
                'nama_gejala' => 'Bercak Putih atau Kepelaran pada Kulit ',
            ],
            [
                'kode_gejala' => 'G23',
                'nama_gejala' => 'Hilangnya pigmen warna di rambut, janggut, bulu mata, dan alis, sehingga terlihat seperti uban  ',
            ],
            [
                'kode_gejala' => 'G24',
                'nama_gejala' => 'Bagian tengah bercak berwarna putih sedangkan tepinya kecokelatan atau kemerahan',
          
            ],
        ];

        // Masukkan data gejala penyakit kulit ke dalam tabel gejala
        foreach ($gejalaPenyakitKulit as $item) {
            Gejala::create($item);
        }
    }
}
