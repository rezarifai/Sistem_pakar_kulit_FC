<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gejala;
use App\Models\Pasien;
use App\Models\Penyakit;

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
        return view('home',compact('jumlahPasien','jumlahGejala','jumlahPenyakit'));
    }
}
