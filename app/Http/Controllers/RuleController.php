<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('rules.index', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $gejala = Gejala::all();

        return view('rules.edit')->with(['penyakit' => $penyakit, 'gejala' => $gejala]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'gejala_id' => 'required|array|min:1', // Minimal harus ada satu gejala yang dipilih
            'gejala_id.*' => 'exists:gejala,id', // Pastikan setiap gejala yang dipilih ada dalam database
        ]);
    
        // Ambil data penyakit berdasarkan ID yang diberikan
        $penyakit = Penyakit::findOrFail($id);
    
        // Update gejala pada penyakit yang bersangkutan
        $penyakit->gejalas()->sync($request->gejala_id);
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('rules.index')->with('success', 'Data aturan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
