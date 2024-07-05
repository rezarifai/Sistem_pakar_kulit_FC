<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use App\Models\Gejala;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function formDiagnosa()
     {
        $gejalaPertama = Gejala::first();
        session()->put('penyakit_diperiksa', []);
        
         return view('form_diagnosa', ['gejala' => $gejalaPertama]);
     }
 
     /**
      * Process each gejala and navigate to the next one.
      */
     public function nextGejala(Request $request)
     {
         $gejalaId = $request->input('gejala_id');
         $jawaban = $request->input('jawaban');
 
         // Simpan jawaban ke sesi atau database sementara
         session()->push('gejala_dijawab', [
             'id' => $gejalaId,
             'jawaban' => $jawaban
         ]);
 
         // Dapatkan gejala berikutnya berdasarkan jawaban
         $gejalaBerikutnya = $this->getNextGejala($gejalaId, $jawaban);
 
         if ($gejalaBerikutnya) {
             return view('form_diagnosa', ['gejala' => $gejalaBerikutnya]);
         } else {
             // Jika tidak ada gejala berikutnya, proses hasil diagnosa
             return $this->prosesDiagnosa();
         }
     }
 
     /**
      * Get the next gejala based on the current gejala and answer.
      */
      private function getNextGejala($currentGejalaId, $jawaban)
      {
          $gejala = Gejala::find($currentGejalaId);
          $penyakitTerkait = $gejala->penyakits;
  
          if ($jawaban == 'ya') {
              // Jika jawaban "ya", ambil gejala berikutnya dari penyakit yang sama
              foreach ($penyakitTerkait as $penyakit) {
                  if (!in_array($penyakit->id, session()->get('penyakit_diperiksa'))) {
                      session()->push('penyakit_diperiksa', $penyakit->id);
                      $gejalaBerikutnya = $penyakit->gejalas->where('id', '!=', $currentGejalaId)->first();
                      if ($gejalaBerikutnya) {
                          return $gejalaBerikutnya;
                      }
                  }
              }
          } else {
              // Jika jawaban "tidak", lompat ke gejala pertama dari penyakit lain yang belum diperiksa
              foreach ($penyakitTerkait as $penyakit) {
                  session()->push('penyakit_diperiksa', $penyakit->id);
              }
  
              $penyakitLain = Penyakit::whereNotIn('id', session()->get('penyakit_diperiksa'))->first();
              if ($penyakitLain) {
                  session()->push('penyakit_diperiksa', $penyakitLain->id);
                  return $penyakitLain->gejalas->first();
              }
          }
  
          // Jika tidak ada gejala berikutnya
          return null;
      }
 
     /**
      * Process the final diagnosis.
      */
      private function prosesDiagnosa()
    {
        $gejalaYangDipilih = collect(session('gejala_dijawab'))->where('jawaban', 'ya')->pluck('id');

        $penyakitMungkin = [];
        foreach ($gejalaYangDipilih as $gejalaId) {
            $gejala = Gejala::find($gejalaId);
            $penyakit = $gejala->penyakits;

            foreach ($penyakit as $item) {
                if (!isset($penyakitMungkin[$item->id])) {
                    $penyakitMungkin[$item->id] = [
                        'kode' => $item->kode_penyakit,
                        'nama' => $item->nama_penyakit,
                        'gambar' => $item->gambar,
                        'persentase' => 0,
                        'penyebab' => $item->penyebab,
                        'solusi' => $item->solusi,
                        'total_gejala' => $item->gejalas->count(), // Tambahkan total gejala
                        'cocok_gejala' => 0
                    ];
                }
                $penyakitMungkin[$item->id]['cocok_gejala'] += 1;
            }
        }

        if (count($penyakitMungkin) > 0) {
            // Hitung persentase untuk setiap penyakit
            foreach ($penyakitMungkin as $id => $penyakit) {
                $penyakitMungkin[$id]['persentase'] = ($penyakit['cocok_gejala'] / $penyakit['total_gejala']) * 100;
            }

            // Temukan penyakit dengan persentase tertinggi
            $penyakitTerbesar = collect($penyakitMungkin)->sortByDesc('persentase')->first();
        } else {
            $penyakitTerbesar = null;
        }

        $selectedSymptoms = Gejala::whereIn('id', $gejalaYangDipilih)->get();

        session()->forget('gejala_dijawab');
        session()->forget('penyakit_diperiksa');

        return view('hasil_diagnosa', compact('penyakitTerbesar', 'selectedSymptoms'));
    }
    
    public function index()
    {
        $riwayatDiagnosa = Diagnosa::all();
        return view('riwayatdiagnosa.index',compact('riwayatDiagnosa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riwayatdiagnosa.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pasien' => 'required|unique:gejala',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        // Simpan data gejala ke dalam database
        $diagnosas = new Diagnosa();
        $diagnosas->nama_pasien = $request->nama_pasien;
        $diagnosas->tanggal_lahir = $request->tanggal_lahir;
        $diagnosas->alamat = $request->tanggal_lahir;
        $diagnosas->jenis_kelamin = $request->jenis_kelamin;
        $diagnosas->riwayat_kesehatan = $request->riwayat_kesehatan;
        $diagnosas->save();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('riwayatdiagnosa.index')->with('success', 'Diagnosa berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $diagnosas = Diagnosa::findOrFail($id); 
        return view('riwayatdiagnosa.edit', compact('riwayatdiagnosa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Diagnosa::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        // Update data gejala dengan data baru
        $item->nama_pasien = $request->nama_pasien;
        $item->tanggal_lahir = $request->tanggal_lahir;
        $item->alamat = $request->alamat;
        $item->jenis_kelamin = $request->jenis_kelamin;
        $item->riwayat_kesehatan = $request->riwayat_kesehatan;
        $item->save();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
