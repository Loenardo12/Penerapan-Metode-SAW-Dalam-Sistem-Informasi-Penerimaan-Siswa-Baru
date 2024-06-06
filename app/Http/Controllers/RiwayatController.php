<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Pemohon;
use Barryvdh\DomPDF\Facade\Pdf;


class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tb_calon_siswa = Pemohon::get();
        $riwayatpengajuan = Riwayat::select(
            'riwayat_pengajuan.id as id',

            'riwayat_pengajuan.ID_CALON as idpem',
            'tb_calon_siswa.nama as nama',

            'riwayat_pengajuan.tanggal_pengajuan as tgl',
            'riwayat_pengajuan.status_pengajuan as status',
        )
            ->leftJoin('tb_calon_siswa', 'riwayat_pengajuan.ID_CALON', '=', 'tb_calon_siswa.id')
            ->get();

        return view('riwayat_pengajuan.index', compact('riwayatpengajuan', 'tb_calon_siswa'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pemohon $tb_calon_siswa)
    {
        $tb_calon_siswa = Pemohon::all();

        return view('riwayat_pengajuan.create', compact('tb_calon_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'tanggal_pengajuan' => 'required',
            'status_pengajuan' => 'required',
        ]);

        Riwayat::create($request->all());

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil ditambahkan.');
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
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $tb_calon_siswa = Pemohon::all();
        return view('riwayat_pengajuan.edit', compact('riwayatpengajuan', 'tb_calon_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riwayat $riwayatpengajuan, $id)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'tanggal_pengajuan' => 'required',
            'status_pengajuan' => 'required',
        ]);
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $riwayatpengajuan->update($request->all());

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayatpengajuan, $id)
    {
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $riwayatpengajuan->delete();

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil dihapus.');
    }
    public function print()
    {
        $tb_calon_siswa = Pemohon::get();
        $riwayatpengajuan = Riwayat::select(
            'riwayat_pengajuan.id as id',

            'riwayat_pengajuan.ID_CALON as idpem',
            'tb_calon_siswa.nama as nama',

            'riwayat_pengajuan.tanggal_pengajuan as tgl',
            'riwayat_pengajuan.status_pengajuan as status',
        )
            ->leftJoin('tb_calon_siswa', 'riwayat_pengajuan.ID_CALON', '=', 'tb_calon_siswa.id')
            ->get();
        $tb_calon_siswa = Pemohon::all();
        $pdf = Pdf::loadview('riwayat_pengajuan.print', compact('tb_calon_siswa', 'riwayatpengajuan'));
        return $pdf->download('laporan-riwayat-pengajuan.pdf');
    }
}
