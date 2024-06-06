<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Pemohon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkas = Berkas::select(
            'berkas.id as id',
            'berkas.ID_CALON as idp',
            'tb_calon_siswa.nama as nama',
            'berkas.gambar as img',
        )
            ->leftJoin('tb_calon_siswa', 'berkas.ID_CALON', '=', 'tb_calon_siswa.id')
            ->get();

        $tb_calon_siswa = Pemohon::get();

        return view('berkas.index', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tb_calon_siswa = Pemohon::all();
        return view('berkas.create', compact('tb_calon_siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'gambar' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $tujuan_upload = 'img_berkas';
        $gambar->move($tujuan_upload, $nama_gambar);

        Berkas::create([
            'ID_CALON' => $request->ID_CALON,
            'gambar' => $nama_gambar,
        ]);

        return redirect()->route('berkas.index')
            ->with('success', 'Berkas created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Berkas $berkas)
    {
        // Tambahkan logika sesuai kebutuhan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berkas $berkas, $id)
    {
        $berkas = Berkas::findOrFail($id);
        $tb_calon_siswa = Pemohon::all();
        return view('berkas.edit', compact('tb_calon_siswa', 'berkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berkas $berkas)
    {
        $request->validate([
            'ID_CALON' => 'required',
            'gambar' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            File::delete(public_path('img_berkas/' . $berkas->gambar));

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_berkas';
            $gambar->move($tujuan_upload, $nama_gambar);

            $berkas->gambar = $nama_gambar;
            $berkas->save();
        }

        return redirect()->route('berkas.index')
            ->with('success', 'Berkas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berkas $berkas, $id)
    {
        $berkas = Berkas::findOrFail($id);
        File::delete(public_path('img_berkas/' . $berkas->gambar));
        $berkas->delete();

        return redirect()->route('berkas.index')
            ->with('success', 'Berkas deleted successfully');
    }
}
