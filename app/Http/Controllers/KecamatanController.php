<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::with(['kabupaten'])->latest()->get();
        return view('kecamatan.index',  compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupaten = Kabupaten::all();
        return view('kecamatan.create', compact('kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kecamatan'  => 'required',
            'id_kabupaten'  => 'required',
        ]);
        //insert data
        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
            'id_kabupaten' => $request->id_kabupaten,

        ]);

        return redirect()->route('kecamatan.index')->with('success', 'Data Berhasil di Tambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kecamatan $kecamatan)
    {
        $kabupaten = Kabupaten::all();
        return view('kecamatan.edit',  compact('kecamatan', 'kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('kecamatans')->where('id_kecamatan', $id)->update([
            'nama_kecamatan'    => $request->nama_kecamatan,
            'id_kabupaten' => $request->id_kabupaten,
        ]);

        return redirect()->route('kecamatan.index')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kecamatans')->where('id_kecamatan', $id)->delete();
        return redirect()->route('kecamatan.index')->with('info', 'Data Berhasil Dihapus!');
    }
}
