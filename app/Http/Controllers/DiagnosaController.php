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
    public function formPenyakit()
{
    $penyakits = Penyakit::all();
    return view('form_penyakit',compact('penyakits'));
}
    
    public function formDiagnosa()
{
    $gejalaPertama = Gejala::first();
    $semuaGejala = Gejala::pluck('id')->toArray();
    session()->put('penyakit_diperiksa', []);
    session()->put('gejala_dijawab', []);
    session()->put('semua_gejala', $semuaGejala);
    session()->put('index_gejala', 0);

    return view('form_diagnosa', ['gejala' => $gejalaPertama]);
}

public function nextGejala(Request $request)
{
    $gejalaId = $request->input('gejala_id');
    $jawaban = $request->input('jawaban');

    // Simpan jawaban ke sesi
    session()->push('gejala_dijawab', [
        'id' => $gejalaId,
        'jawaban' => $jawaban
    ]);

    // Dapatkan indeks gejala berikutnya
    $indexGejala = session()->get('index_gejala');
    $indexGejala++;
    session()->put('index_gejala', $indexGejala);

    $semuaGejala = session()->get('semua_gejala');

    // Periksa apakah masih ada gejala yang belum dijawab
    if ($indexGejala < count($semuaGejala)) {
        $gejalaBerikutnyaId = $semuaGejala[$indexGejala];
        $gejalaBerikutnya = Gejala::find($gejalaBerikutnyaId);
        return view('form_diagnosa', ['gejala' => $gejalaBerikutnya]);
    } else {
        // Jika semua gejala telah dijawab, proses hasil diagnosa
        return $this->prosesDiagnosa();
    }
}

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
                    'total_gejala' => $item->gejalas->count(),
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

        // Urutkan penyakit berdasarkan persentase tertinggi
        $penyakitTerbesar = collect($penyakitMungkin)->sortByDesc('persentase');
    } else {
        $penyakitTerbesar = null;
    }

    $selectedSymptoms = Gejala::whereIn('id', $gejalaYangDipilih)->get();

    session()->forget('gejala_dijawab');
    session()->forget('penyakit_diperiksa');
    session()->forget('semua_gejala');
    session()->forget('index_gejala');

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
