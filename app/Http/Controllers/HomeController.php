<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Diagnosa;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahPasien = Pasien::count();
        $jumlahGejala = Gejala::count();
        $jumlahPenyakit = Penyakit::count();
        $riwayat = Diagnosa::get()
        ->map(function ($item) {
            return [
                'user_id' => $item->user_id,
                'waktu' => $item->created_at->format('Y-m-d H:i:s') // tanggal + jam + menit + detik
            ];
        })
        ->unique()
        ->count();
    
    
        return view('home',compact('jumlahPasien','jumlahGejala','jumlahPenyakit','riwayat'));
    }
}
