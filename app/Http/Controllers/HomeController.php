<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pemohon;
use App\Models\Berkas;
use App\Models\Riwayat;



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
        $tb_staff = User::all();
        $riwayatpengajuan = Riwayat::all();
        $berkas = Berkas::count();
        $tb_calon_siswacount = Pemohon::count();
        return view('home', compact('tb_staff', 'berkas', 'siswacount', 'riwayatpengajuan'));
    }
}
