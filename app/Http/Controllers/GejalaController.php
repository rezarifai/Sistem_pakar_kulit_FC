<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gejala = Gejala::all();
        return view('gejala.index',compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gejala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_gejala' => 'required|unique:gejala',
            'nama_gejala' => 'required',
        ]);

        // Simpan data gejala ke dalam database
        $gejala = new Gejala();
        $gejala->kode_gejala = $request->kode_gejala;
        $gejala->nama_gejala = $request->nama_gejala;
        $gejala->save();

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil ditambahkan!');
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
        $gejala = Gejala::findOrFail($id); 
        return view('gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Gejala::findOrFail($id);

        // Validasi input
        $request->validate([
            'kode_gejala' => 'required|unique:gejala,kode_gejala,'.$id,
            'nama_gejala' => 'required',
        ]);

        // Update data gejala dengan data baru
        $item->kode_gejala = $request->kode_gejala;
        $item->nama_gejala = $request->nama_gejala;
        $item->save();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Gejala::findOrFail($id); 
        $item->delete();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil dihapus!');
    }
}
