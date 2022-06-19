<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreObatRequest;
use App\Http\Requests\UpdateObatRequest;
use App\Models\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/obat', [
            "judul" => "Input data Obat",
            "obat" => Obat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat = new Obat;

        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'jenis_obat' => 'required',
            'harga' => 'required',
        ]);

        $obat->nama_obat = $request->nama_obat;
        $obat->kategori = $request->kategori;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->harga = $request->harga;
        $obat->save();

        return back()->with('success', 'Berhasil menambahkan data Obat baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        return view('admin/edit_obat', [
            "judul" => "Edit data Obat",
            "obat" => Obat::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatRequest  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obat = new Obat;

        $request->validate([
            'nama_obat' => 'required',
            'kategori' => 'required',
            'jenis_obat' => 'required',
            'harga' => 'required',
        ]);

        $cek_obat = Obat::findOrFail($id);

        $cek_obat->nama_obat = $request->nama_obat;
        $cek_obat->kategori = $request->kategori;
        $cek_obat->jenis_obat = $request->jenis_obat;
        $cek_obat->jenis_obat = $request->jenis_obat;
        $cek_obat->harga = $request->harga;
        $cek_obat->save();

        return back()->with('success', 'Update Data Obat berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();

        return back()->with('success', ' Penghapusan obat berhasil.');
    }
}
