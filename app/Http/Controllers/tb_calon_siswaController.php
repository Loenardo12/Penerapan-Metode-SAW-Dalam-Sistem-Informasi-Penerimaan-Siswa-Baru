<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tb_calon_siswa = Pemohon::get();
        return view('pemohon.index', compact('tb_calon_siswa'))->with('i', 0);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tb_calon_siswa = Pemohon::get();
        return view('pemohon.create', compact('tb_calon_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'EMAIL' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'city' => 'required',
        ]);

        Pemohon::create($request->all());

        return redirect()->route('tb_calon_siswa.index')
            ->with('success', 'Pemohon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemohon $tb_calon_siswa, $id)
    {
        $tb_calon_siswa = Pemohon::findOrFail($id);
        return view('pemohon.edit', compact('tb_calon_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemohon $tb_calon_siswa, $id)
    {
        $request->validate([
            'nama' => 'required',
            'EMAIL' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'city' => 'required',
        ]);
        $tb_calon_siswa = Pemohon::findOrFail($id);
        $tb_calon_siswa->update($request->all());

        return redirect()->route('tb_calon_siswa.index')
            ->with('success', 'Pemohon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemohon $tb_calon_siswa, $id)
    {
        $tb_calon_siswa = Pemohon::findOrFail($id);
        $tb_calon_siswa->delete();

        return redirect()->route('tb_calon_siswa.index')
            ->with('success', 'Pemohon deleted successfully');
    }

    public function print()
    {
        $tb_calon_siswa = Pemohon::all();
        $pdf = Pdf::loadview('pemohon.print', compact('tb_calon_siswa'));
        return $pdf->download('laporan-pemohon.pdf');
    }
}
