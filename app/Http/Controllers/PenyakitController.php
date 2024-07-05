<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit',
            'nama_penyakit' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required',
            'gambar' => 'required|image|max:2048'
        ]);

        $gambarPath = $request->file('gambar')->store('penyakit', 'public');

        Penyakit::create([
            'kode_penyakit' => $request->kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'penyebab' => $request->penyebab,
            'solusi' => $request->solusi,
            'gambar' => $gambarPath
        ]);

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil ditambahkan.');
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
    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit,' . $penyakit->id,
            'nama_penyakit' => 'required',
            'penyebab' => 'required',
            'solusi' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('penyakit', 'public');
            $penyakit->gambar = $gambarPath;
        }

        $penyakit->update([
            'kode_penyakit' => $request->kode_penyakit,
            'nama_penyakit' => $request->nama_penyakit,
            'penyebab' => $request->penyebab,
            'solusi' => $request->solusi,
            'gambar' => $penyakit->gambar
        ]);

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyakit $penyakit)
    {
        if ($penyakit->gambar) {
            Storage::disk('public')->delete($penyakit->gambar);
        }

        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil dihapus.');
    }
}
