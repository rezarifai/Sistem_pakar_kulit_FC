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
                'nama_gejala' => 'Riwayat kontak dengan substance tertentu sebelum keluhan ',
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Bercak dan bintik kemerahan hingga blister pada daerah yang berkontak dengan bahan tertentu',
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Kulit kering, bersisik, dan pecah-pecah ',
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Keluhan gatal dan kemerahan bersisik pada daerah kulit kepala, alis, telinga, atau daerah lain yang banyak mengandung kelenjar sebasea (mis. Punggung, dada, etc.) ',
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Bercak Kulit Tebal dan Merah dengan Sisik Putih Keperakan ',
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Erythema bersquama pada daerah perbatasan dengan rambut atau daerah lain yang banyak mengandung kelenjar sebasea ',
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Bercak merah bersisik tebal yang gatal terutama pada daerah yang sering bergesekan, misalkan pada siku, lutut, dan punggung. Pada beberapa kasus mungkin disertai nyeri, distrofi kuku, mata kering, peradangan conjunctiva, blepharitis, dan nyeri sendi',
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Squama tebal, candle sign, Auspitz sign, Koebner sign',
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Lepuh pecah dan membentuk kerak berwarna madu atau kuning kecoklatan',
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Bintik-bintik berisi cairan menyerupai cacar, kadang berisi pus/nanah, terasa gatal, dan tidak selalu diiringi dengan demam ',
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Honey-coloured crusted lesion',
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Gejala diawali macula erythematosa tunggal yang berubah menjadi vesicle atau pustula yang ketika pecah mengeluarkan cairan serosa yang mengering dan menjadi crusta eksudat yang berwarna kekuningan seperti madu di atas erosi kulit. Lesi ini kemudian menyebar ke area distal melalui inokulasi luka lain saat ada garukan',
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Bintik-bintik berisi cairan bening disertai dengan demam, nyeri kepala, dan malaise. Lesi biasanya berpola sebaran sentripetal dimulai di tubuh dahulu ',
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Tear drop vesicle',
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Erupsi macular yang, dalam beberapa jam, berubah menjadi papula, teardrop vesicle yang gatal, dengan dasar kemerahan. Lesi kemudian akan berubah menjadi pustula dan crusta ',
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Bintik-bintik dengan sebaran terlokalisir. Merupakan penyakit dengan etiologi yang sama dengan chicken pox, reaktivasi virus Varicella zoster pada fase laten. ',
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Lokasi lesi sesuai dengan dermatom ',
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Lancinating, dysesthetic, atau nyeri pada lokasi lesi sesuai dengan dermatom, disertai ruam, crops of vesicles dengan dasar erythematous. Biasanya lokasi pada satu atau lebih dermatom berdekatan pada regio thorax atau lumbal, bersifat unilateral, dan tidak melewati bagian tengah tubuh. Mungkin ada lesi satelit ',
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Bercak kemerahan yang gatal terutama pada saat berkeringat di daerah sela paha dan bokong ',
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Faktor risiko berkaitan dengan moist environment (mis. Pakaian basah dan restriktif, cuaca hangat, obesitas)',
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Lesi pruritik kemerahan berbentuk cincin, aktif pada bagian tepi lesi yang meluas dari crural fold ke lipat paha bagian dalam atau bagian lain yang berdekatan. Lesi mungkin bilateral ',
            ],
            [
                'kode_gejala' => 'G22',
                'nama_gejala' => 'Bercak Putih atau Kepelaran pada Kulit ',
            ],
            [
                'kode_gejala' => 'G23',
                'nama_gejala' => 'Bintik-bintik kemerahan pada daerah wajah dan punggung, kadang disertai keluhan gatal dan/atau nyeri  ',
            ],
            [
                'kode_gejala' => 'G24',
                'nama_gejala' => 'Comedone, papula, pustula, nodul, dan/atau kista sebagai akibat dari sumbatan dan inflamasi dari pilosebaceous unit ',
            ],
            [
                'kode_gejala' => 'G25',
                'nama_gejala' => 'Bercak putih seperti susu pada bagian kulit yang tidak gatal dan tidak nyeri ',
            ],
            [
                'kode_gejala' => 'G26',
                'nama_gejala' => 'Kenampakan hypopigmented atau depigmented areas dengan berbagai ukuran, berbatas tegas, dan simetris ',
            ],
            [
                'kode_gejala' => 'G27',
                'nama_gejala' => 'Bercak putih seperti susu pada bagian kulit yang tidak gatal dan tidak nyeri. Bisa terlokalisir (segmental vitiligo) maupun mencakup area luas (universal vitiligo) ',
            ],
            [
                'kode_gejala' => 'G28',
                'nama_gejala' => 'Bentol besar dan kemerahan yang disertai rasa gatal dan panas, tidak ada predileksi tertentu (bisa di bagian tubuh mana pun) ',
            ],
            [
                'kode_gejala' => 'G29',
                'nama_gejala' => 'Plak pruritik, erythematous, berbatas tegas yang timbul sebagai akibat reaksi hipersensitivitas atau penyakit autoimun ',
            ],
            [
                'kode_gejala' => 'G30',
                'nama_gejala' => 'Gatal pada kulit yang mengalami ruam ',
          
            ],
        ];

        // Masukkan data gejala penyakit kulit ke dalam tabel gejala
        foreach ($gejalaPenyakitKulit as $item) {
            Gejala::create($item);
        }
    }
}
