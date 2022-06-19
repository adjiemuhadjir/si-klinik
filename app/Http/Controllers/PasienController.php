<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePasienRequest;
use App\Http\Requests\UpdatePasienRequest;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pasien', [
            "judul" => "Input data Pasien",
            "pasien" => Pasien::all()
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
     * @param  \App\Http\Requests\StorePasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new Pasien;

        $request->validate([
            'nomor' => 'required',
            'nama' => 'required',
            'agama' => 'required',
            'telp' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
        ]);

        $pasien->nomor = $request->nomor;
        $pasien->nama = $request->nama;
        $pasien->agama = $request->agama;
        $pasien->telp = $request->telp;
        $pasien->usia = $request->usia;
        $pasien->alamat = $request->alamat;
        $pasien->keterangan = $request->keterangan;
        $pasien->save();

        return back()->with('success', 'Berhasil menambahkan data Pasien baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        return view('admin/edit_pasien', [
            "judul" => "Edit data Pasien",
            "pasien" => Pasien::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasienRequest  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = new Pasien;

        $request->validate([
            'nomor' => 'required',
            'nama' => 'required',
            'agama' => 'required',
            'telp' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            // 'password' => 'required',
        ]);

        $cek_pasien = Pasien::findOrFail($id);

        $cek_pasien->nomor = $request->nomor;
        $cek_pasien->nama = $request->nama;
        $cek_pasien->agama = $request->agama;
        $cek_pasien->telp = $request->telp;
        $cek_pasien->usia = $request->usia;
        $cek_pasien->alamat = $request->alamat;
        $cek_pasien->keterangan = $request->keterangan;
        $cek_pasien->save();

        return back()->with('success', 'Update Data Pasien berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return back()->with('success', ' Penghapusan Pasien berhasil.');
    }
}
