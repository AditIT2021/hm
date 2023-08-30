<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::with(['kecamatan'])->latest()->get();
        return view('desa.index',  compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('desa.create', compact('kecamatan'));
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
            'nama_desa'  => 'required',
            'id_kecamatan'  => 'required',
            'rt'  => 'required',
            'rw'  => 'required',
        ]);
        //insert data
        Desa::create([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect()->route('desa.index')->with('success', 'Data Berhasil di Tambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Desa $desa)
    {
        $kecamatan = Kecamatan::all();
        return view('desa.edit',  compact('desa', 'kecamatan'));
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
        DB::table('desas')->where('id_desa', $id)->update([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        return redirect()->route('desa.index')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('desas')->where('id_desa', $id)->delete();
        return redirect()->route('desa.index')->with('info', 'Data Berhasil Dihapus!');
    }
}
