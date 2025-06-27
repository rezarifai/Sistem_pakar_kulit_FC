<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function formPenyakit()
    {
        $penyakits = Penyakit::all();
        return view('form_penyakit', compact('penyakits'));
    }

    public function formDiagnosa()
    {
        $rules = Rule::with('gejala', 'penyakit')->get()->groupBy('penyakit_id');

        $penyakitRules = [];
        foreach ($rules as $penyakitId => $ruleList) {
            $penyakitRules[$penyakitId] = $ruleList->pluck('gejala_id')->toArray();
        }

        $semuaGejala = collect($penyakitRules)->flatten()->unique()->values()->toArray();

        session()->put('penyakit_rules', $penyakitRules);
        session()->put('penyakit_diperiksa', array_keys($penyakitRules));
        session()->put('gejala_dijawab', []);
        session()->put('index_gejala', 0);
        session()->put('gejala_aktif', $semuaGejala);

        return view('form_diagnosa', [
            'gejala' => Gejala::find($semuaGejala[0]),
            'total_gejala' => count($semuaGejala),
            'index_gejala' => 1
        ]);
    }


    public function nextGejala(Request $request)
    {
        $gejalaId = $request->input('gejala_id');
        $jawaban = $request->input('jawaban');

        session()->push('gejala_dijawab', [
            'id' => $gejalaId,
            'jawaban' => $jawaban
        ]);

        $rules = session()->get('penyakit_rules');
        $aktifPenyakit = session()->get('penyakit_diperiksa');

        if ($jawaban === 'tidak') {
            $aktifPenyakit = array_filter($aktifPenyakit, function ($penyakitId) use ($rules, $gejalaId) {
                return !in_array($gejalaId, $rules[$penyakitId]);
            });

            session()->put('penyakit_diperiksa', $aktifPenyakit);

            if (empty($aktifPenyakit)) {
                return $this->prosesDiagnosa();
            }

            $gejalaBaru = collect($aktifPenyakit)
                ->map(fn($id) => $rules[$id])
                ->flatten()
                ->unique()
                ->values()
                ->toArray();

            session()->put('gejala_aktif', $gejalaBaru);
        }

        $indexGejala = session()->get('index_gejala') + 1;
        session()->put('index_gejala', $indexGejala);

        $gejalaAktif = session()->get('gejala_aktif');

        if (isset($gejalaAktif[$indexGejala])) {
            return view('form_diagnosa', [
                'gejala' => Gejala::find($gejalaAktif[$indexGejala]),
                'total_gejala' => count($gejalaAktif),
                'index_gejala' => $indexGejala + 1
            ]);
        } else {
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
            foreach ($penyakitMungkin as $id => $penyakit) {
                $penyakitMungkin[$id]['persentase'] = ($penyakit['cocok_gejala'] / $penyakit['total_gejala']) * 100;
            }

            $penyakitTerbesar = collect($penyakitMungkin)->sortByDesc('persentase');
            foreach ($penyakitTerbesar as $id => $penyakit) {
                Diagnosa::create([
                    'user_id' => auth()->id(),
                    'tanggal_diagnosa' => now(),
                    'penyakit_id' => $id,
                    'persentase' => $penyakit['persentase'],
                    'gejala_terpilih' => json_encode(session('gejala_dijawab'))
                ]);
            }
        } else {
            $penyakitTerbesar = null;
        }

        $selectedSymptoms = Gejala::whereIn('id', $gejalaYangDipilih)->get();
        $user = auth()->user();
        $today = now()->toDateString();

        session()->forget('gejala_dijawab');
        session()->forget('penyakit_diperiksa');
        session()->forget('semua_gejala');
        session()->forget('index_gejala');

        return view('hasil_diagnosa', compact('penyakitTerbesar', 'selectedSymptoms', 'user', 'today'));
    }

    public function index()
    {
        $riwayatDiagnosa = Diagnosa::with('penyakit', 'user')
            ->get()
            ->groupBy(function ($diagnosa) {
                return \Carbon\Carbon::parse($diagnosa->created_at)->format('Y-m-d H:i:s');
            })
            ->map(function ($diagnosesByDate) {
                return $diagnosesByDate->groupBy('user_id');
            });

        return view('riwayatdiagnosa.index', compact('riwayatDiagnosa'));
    }

    public function create()
    {
        return view('riwayatdiagnosa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|unique:gejala',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        $diagnosas = new Diagnosa();
        $diagnosas->nama_pasien = $request->nama_pasien;
        $diagnosas->tanggal_lahir = $request->tanggal_lahir;
        $diagnosas->alamat = $request->tanggal_lahir;
        $diagnosas->jenis_kelamin = $request->jenis_kelamin;
        $diagnosas->riwayat_kesehatan = $request->riwayat_kesehatan;
        $diagnosas->save();

        return redirect()->route('riwayatdiagnosa.index')->with('success', 'Diagnosa berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $diagnosas = Diagnosa::findOrFail($id);
        return view('riwayatdiagnosa.edit', compact('riwayatdiagnosa'));
    }

    public function update(Request $request, string $id)
    {
        $item = Diagnosa::findOrFail($id);

        $request->validate([
            'nama_pasien' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'riwayat_kesehatan' => 'required',
        ]);

        $item->nama_pasien = $request->nama_pasien;
        $item->tanggal_lahir = $request->tanggal_lahir;
        $item->alamat = $request->alamat;
        $item->jenis_kelamin = $request->jenis_kelamin;
        $item->riwayat_kesehatan = $request->riwayat_kesehatan;
        $item->save();

        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diperbarui!');
    }
}
