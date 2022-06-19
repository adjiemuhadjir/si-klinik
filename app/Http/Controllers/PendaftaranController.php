<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use App\Models\Pendaftaran;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Pegawai;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pendaftaran', [
            "judul" => "Input data Pendaftaran",
            "pendaftaran" => Pendaftaran::join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->get(['pendaftarans.*', 'pasiens.id as id_pasien', 'polis.id as id_poli', 'pegawais.id as id_dokter', 'polis.poli', 'pegawais.nama as nama_dokter', 'pasiens.nama as nama_pasien']),
            "pasien" => Pasien::all(),
            "poli" => Poli::all(),
            "dokter" => Pegawai::join('users', 'pegawais.id', '=', 'users.id_pegawai')->where('users.role', '=', 'Dokter')->get(['pegawais.id as id_dokter', 'pegawais.nama as nama_dokter']),
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
     * @param  \App\Http\Requests\StorePendaftaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendaftaran = new Pendaftaran;

        $request->validate([
            'id_pasien' => 'required',
            'keluhan' => 'required',
            'jenis_layanan' => 'required',
            'id_poli' => 'required',
            'tanggal' => 'required',
            'id_dokter' => 'required',
        ]);

        $pendaftaran->id_pasien = $request->id_pasien;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->jenis_layanan = $request->jenis_layanan;
        $pendaftaran->id_poli = $request->id_poli;
        $pendaftaran->tanggal = $request->tanggal;
        $pendaftaran->id_dokter = $request->id_dokter;
        $pendaftaran->save();

        return back()->with('success', 'Berhasil menambahkan data Pendaftaran baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_pendaftaran', [
            "judul" => "Edit data Pendaftaran",
            "pendaftaran" => Pendaftaran::join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->where('pendaftarans.id', $id)->select('pendaftarans.*', 'pasiens.id as id_pasien', 'polis.id as id_poli', 'pegawais.id as id_dokter', 'polis.poli', 'pegawais.nama as nama_dokter', 'pasiens.nama as nama_pasien')->first(),
            "pasien" => Pasien::all(),
            "poli" => Poli::all(),
            "dokter" => Pegawai::join('users', 'pegawais.id', '=', 'users.id_pegawai')->where('users.role', '=', 'Dokter')->get(['pegawais.id as id_dokter', 'pegawais.nama as nama_dokter']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftaranRequest  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendaftaran = new Pendaftaran;

        $request->validate([
            'id_pasien' => 'required',
            'keluhan' => 'required',
            'jenis_layanan' => 'required',
            'id_poli' => 'required',
            'tanggal' => 'required',
            'id_dokter' => 'required',
        ]);

        $cek_pendaftaran = Pendaftaran::findOrFail($id);

        $cek_pendaftaran->id_pasien = $request->id_pasien;
        $cek_pendaftaran->keluhan = $request->keluhan;
        $cek_pendaftaran->jenis_layanan = $request->jenis_layanan;
        $cek_pendaftaran->id_poli = $request->id_poli;
        $cek_pendaftaran->tanggal = $request->tanggal;
        $cek_pendaftaran->id_dokter = $request->id_dokter;
        $cek_pendaftaran->save();

        return back()->with('success', 'Update Data Pendaftaran berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->delete();

        return back()->with('success', ' Penghapusan Pendaftaran berhasil.');
    }
}
