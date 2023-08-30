<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return view('provinsi.index',  compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
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
            'nama_provinsi'  => 'required',
        ]);
        //insert data
        Provinsi::create([
            'nama_provinsi' => $request->nama_provinsi,
        ]);

        return redirect()->route('provinsi.index')->with('success', 'Data Berhasil di Tambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Provinsi $provinsi)
    {
        return view('provinsi.edit',  compact('provinsi'));
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
        DB::table('provinsis')->where('id_provinsi', $id)->update([
            'nama_provinsi'    => $request->nama_provinsi,
        ]);

        return redirect()->route('provinsi.index')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('provinsis')->where('id_provinsi', $id)->delete();
        return redirect()->route('provinsi.index')->with('info', 'Data Berhasil Dihapus!');
    }
}
