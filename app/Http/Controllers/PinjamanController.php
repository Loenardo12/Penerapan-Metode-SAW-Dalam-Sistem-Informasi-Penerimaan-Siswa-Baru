<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Pemohon;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Contracts\Service\Attribute\Required;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tb_calon_siswa = Pemohon::get();
        $pinjaman = Pinjaman::select(
            'pinjaman.id as id',
            'pinjaman.ID_CALON as idp',
            'tb_calon_siswa.nama as nama',
            'pinjaman.tanggal_pinjaman as tgl',
            'pinjaman.besar_pinjaman as nom',
            'pinjaman.angsuran as ang',
            'pinjaman.bunga as bng',
            'pinjaman.jangka_waktu as jngk',
        )
            ->leftJoin('tb_calon_siswa', 'pinjaman.ID_CALON', '=', 'tb_calon_siswa.id')
            ->get();

        return view('pinjaman.index', compact('pinjaman', 'tb_calon_siswa'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pemohon $tb_calon_siswa)
    {
        $tb_calon_siswa = Pemohon::all();

        return view('pinjaman.create', compact('tb_calon_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'tanggal_pinjaman' => 'required',
            'besar_pinjaman' => 'required',
            'bunga' => 'required',
            'angsuran' => 'required',
            'jangka_waktu' => 'required',
        ]);

        Pinjaman::create($request->all());

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil ditambahkan.');
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
        $pinjaman = Pinjaman::findOrFail($id);
        $tb_calon_siswa = Pemohon::all();
        return view('pinjaman.edit', compact('pinjaman', 'tb_calon_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjaman $pinjaman, $id)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'tanggal_pinjaman' => 'required',
            'besar_pinjaman' => 'required',
            'bunga' => 'required',
            'angsuran' => 'required',
            'jangka_waktu' => 'required',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update($request->all());

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjaman $pinjaman, $id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil dihapus.');
    }

    public function print()
    {
        $pinjaman = Pinjaman::select(
            'pinjaman.id as id',
            'pinjaman.ID_CALON as idp',
            'tb_calon_siswa.nama as nama',
            'pinjaman.tanggal_pinjaman as tgl',
            'pinjaman.besar_pinjaman as nom',
            'pinjaman.angsuran as ang',
            'pinjaman.bunga as bng',
            'pinjaman.jangka_waktu as jngk',
        )
            ->leftJoin('tb_calon_siswa', 'pinjaman.ID_CALON', '=', 'tb_calon_siswa.id')
            ->get();
        $pinjaman = Pinjaman::get();
        $tb_calon_siswa = Pemohon::get();
        $tb_calon_siswa = Pemohon::all();
        $pinjaman = Pinjaman::all();
        $pdf = Pdf::loadview('pinjaman.print', compact('pinjaman', 'tb_calon_siswa'));
        return $pdf->download('laporan-pinjaman.pdf');
    }
}
