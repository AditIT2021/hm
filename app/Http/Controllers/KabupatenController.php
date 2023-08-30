<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupaten = Kabupaten::with(['provinsi'])->latest()->get();
        return view('kabupaten.index',  compact('kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kabupaten.create', compact('provinsi'));
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
            'nama_kabupaten'  => 'required',
            'id_provinsi'  => 'required',
        ]);
        //insert data
        Kabupaten::create([
            'nama_kabupaten' => $request->nama_kabupaten,
            'id_provinsi' => $request->id_provinsi,
        ]);

        return redirect()->route('kabupaten.index')->with('success', 'Data Berhasil di Tambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kabupaten $kabupaten)
    {
        $provinsi = Provinsi::all();
        return view('kabupaten.edit',  compact('kabupaten', 'provinsi'));
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
        DB::table('kabupatens')->where('id_kabupaten', $id)->update([
            'nama_kabupaten'    => $request->nama_kabupaten,
            'id_provinsi' => $request->id_provinsi,
        ]);

        return redirect()->route('kabupaten.index')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kabupatens')->where('id_kabupaten', $id)->delete();
        return redirect()->route('kabupaten.index')->with('info', 'Data Berhasil Dihapus!');
    }
}
