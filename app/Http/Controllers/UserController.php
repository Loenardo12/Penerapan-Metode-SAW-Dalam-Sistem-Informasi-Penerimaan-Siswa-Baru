<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemohon;
use App\Models\Berkas;
use App\Models\Keluhan;

class UserController extends Controller
{
    public function index()
    {
        $tb_staff = User::all();
        $berkasCount = Berkas::all();
        $berkasCount = Berkas::count();
        $siswacount = Pemohon::count();
        return view('home', ['tb_staff' => $tb_staff], ['siswacount' => $siswacount], ['berkasCount' => $berkasCount]);
    }
    public function create()
    {
        return view('create');
    }
}
