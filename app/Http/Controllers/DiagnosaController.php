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
        // Ambil semua gejala dari database
        $gejala = Gejala::all();

        // Tampilkan view dengan form untuk memilih gejala
        return view('form_diagnosa', compact('gejala'));
    }

    public function prosesDiagnosa(Request $request)
{
    // Ambil gejala yang dipilih oleh pengguna dari form
    $gejalaYangDipilih = $request->input('gejala');

    // Inisialisasi daftar penyakit yang mungkin diderita oleh pengguna
    $penyakitMungkin = [];

    // Lakukan pengecekan aturan untuk setiap gejala yang dipilih
    foreach ($gejalaYangDipilih as $kodeGejala) {
        $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

        // Ambil daftar penyakit yang terkait dengan gejala yang dipilih
        $penyakit = $gejala->penyakit;

        // Tambahkan penyakit ke dalam daftar penyakit yang mungkin
        foreach ($penyakit as $item) {
            $penyakitMungkin[$item->id] = [
                'kode' => $item->kode_penyakit,
                'nama' => $item->nama_penyakit,
            ];
        }
    }

    // Inisialisasi array untuk menyimpan jumlah gejala yang sesuai dengan setiap penyakit
    $penyakitCount = [];

    // Hitung jumlah gejala yang sesuai dengan setiap penyakit dan tambahkan informasi penyebab dan solusi
    foreach ($penyakitMungkin as $idPenyakit => $dataPenyakit) {
        $penyakitCount[$idPenyakit] = 0;

        foreach ($gejalaYangDipilih as $kodeGejala) {
            $gejala = Gejala::where('kode_gejala', $kodeGejala)->first();

            if ($gejala->penyakit->contains('id', $idPenyakit)) {
                $penyakitCount[$idPenyakit]++;
            }
        }

        $totalGejala = count($gejalaYangDipilih);
        $persentase = ($penyakitCount[$idPenyakit] / $totalGejala) * 100;

        $penyakitModel = Penyakit::find($idPenyakit);

        $penyakitMungkin[$idPenyakit]['persentase'] = round($persentase, 2);
        $penyakitMungkin[$idPenyakit]['penyebab'] = $penyakitModel->penyebab;
        $penyakitMungkin[$idPenyakit]['solusi'] = $penyakitModel->solusi;

        // Simpan riwayat diagnosa untuk setiap penyakit
        $riwayatDiagnosa = new Diagnosa();
        $riwayatDiagnosa->user_id = auth()->user()->id;
        $riwayatDiagnosa->tanggal_diagnosa = now();
        $riwayatDiagnosa->penyakit_id = $idPenyakit;
        $riwayatDiagnosa->save();
    }

    // Ambil gejala yang dipilih
    $selectedSymptoms = Gejala::whereIn('kode_gejala', $gejalaYangDipilih)->get();

    // Tampilkan hasil diagnosa bersama dengan gejala yang dipilih
    return view('hasil_diagnosa', compact('penyakitMungkin', 'selectedSymptoms'));
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
