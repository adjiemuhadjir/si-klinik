<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePemeriksaanRequest;
use App\Http\Requests\UpdatePemeriksaanRequest;
use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use App\Models\Pasien;
use App\Models\Tindakan;
use App\Models\Obat;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pemeriksaan', [
            "judul" => "Input data Pemeriksaan",

            "pendaftaran" => Pendaftaran::join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->get(['pendaftarans.id', 'pasiens.nama as nama_pasien', 'pendaftarans.keluhan', 'pendaftarans.jenis_layanan', 'polis.poli', 'pendaftarans.tanggal', 'pegawais.nama as nama_dokter', 'pasiens.usia']),

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
     * @param  \App\Http\Requests\StorePemeriksaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemeriksaan = new Pemeriksaan;

        $request->validate([
            'id_pendaftaran' => 'required',
            'id_tindakan' => 'required',
            'id_obat' => 'required',
            'hasil_pemeriksaan' => 'required',
            'keterangan_pemeriksaan' => 'required',
        ]);

        $pemeriksaan->id_pendaftaran = $request->id_pendaftaran;
        $pemeriksaan->id_tindakan = $request->id_tindakan;
        $pemeriksaan->id_obat = $request->id_obat;
        $pemeriksaan->hasil_pemeriksaan = $request->hasil_pemeriksaan;
        $pemeriksaan->keterangan_pemeriksaan = $request->keterangan_pemeriksaan;
        $pemeriksaan->save();

        return back()->with('success', 'Berhasil menambahkan data Pemeriksaan baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_pemeriksaan', [
            "judul" => "Pemeriksaan Pasien",

            "pendaftaran" => Pendaftaran::join('pemeriksaans', 'pendaftarans.id', '=', 'pemeriksaans.id_pendaftaran', 'left')->join('tindakans', 'pemeriksaans.id_tindakan', '=', 'tindakans.id', 'left')->join('obats', 'pemeriksaans.id_obat', '=', 'obats.id', 'left')->join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id', 'left')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->where('pendaftarans.id', $id)->select('pendaftarans.id', 'pasiens.nama as nama_pasien', 'pendaftarans.keluhan', 'pendaftarans.jenis_layanan', 'polis.id as id_poli', 'tindakans.tindakan', 'polis.poli', 'pendaftarans.tanggal', 'pegawais.nama as nama_dokter', 'pasiens.usia', 'pasiens.keterangan', 'obats.nama_obat', 'pemeriksaans.hasil_pemeriksaan', 'pemeriksaans.keterangan_pemeriksaan', 'obats.id as id_obat', 'pemeriksaans.id as id_pemeriksaan', 'tindakans.id as id_tindakan')->first(),

            "tindakan" => Tindakan::all(),
            "obat" => Obat::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemeriksaanRequest  $request
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        $pemeriksaan = new Pemeriksaan;

        $request->validate([
            'id_tindakan' => 'required',
            'id_obat' => 'required',
            'hasil_pemeriksaan' => 'required',
            'keterangan_pemeriksaan' => 'required',
        ]);

        $cek_pemeriksaan = Pemeriksaan::findOrFail($id);

        $cek_pemeriksaan->id_tindakan = $request->id_tindakan;
        $cek_pemeriksaan->id_obat = $request->id_obat;
        $cek_pemeriksaan->hasil_pemeriksaan = $request->hasil_pemeriksaan;
        $cek_pemeriksaan->keterangan_pemeriksaan = $request->keterangan_pemeriksaan;
        $cek_pemeriksaan->save();

        return back()->with('success', 'Update Data Pemeriksaan berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        //
    }
}
