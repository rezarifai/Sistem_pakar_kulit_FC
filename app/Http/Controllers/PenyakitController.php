<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('penyakit.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit',
            'nama_penyakit' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan data penyakit ke dalam database
        $penyakit = new Penyakit();
        $penyakit->kode_penyakit = $request->kode_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->penyebab = $request->penyebab;
        $penyakit->solusi = $request->solusi;

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $penyakit->gambar = $imageName;
        }

        $penyakit->save();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penyakit = Penyakit::findOrFail($id); 
        return view('penyakit.edit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $penyakit = Penyakit::findOrFail($id);

        // Validasi input
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit,'.$id,
            'nama_penyakit' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data penyakit dengan data baru
        $penyakit->kode_penyakit = $request->kode_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->penyebab = $request->penyebab;
        $penyakit->solusi = $request->solusi;

        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $penyakit->gambar = $imageName;
        }

        $penyakit->save();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyakit = Penyakit::findOrFail($id); 
        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Penyakit berhasil dihapus!');
    }
}
