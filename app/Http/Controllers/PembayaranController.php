<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pembayaran', [
            "judul" => "Data Pembayaran Pasien",

            "pembayaran" => Pembayaran::join('pemeriksaans', 'pembayarans.id_pemeriksaan', '=', 'pemeriksaans.id', 'right')->join('pendaftarans', 'pendaftarans.id', '=', 'pemeriksaans.id_pendaftaran', 'left')->join('tindakans', 'pemeriksaans.id_tindakan', '=', 'tindakans.id', 'left')->join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->join('obats', 'pemeriksaans.id_obat', '=', 'obats.id')->get(['pemeriksaans.*', 'obats.nama_obat', 'obats.harga as harga_obat', 'pasiens.nama as nama_pasien', 'pendaftarans.keluhan', 'pasiens.usia', 'pendaftarans.tanggal', 'tindakans.tindakan']),

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
     * @param  \App\Http\Requests\StorePembayaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pembayaran = new Pembayaran;

        $request->validate([
            'id_pemeriksaan' => 'required',
            'jasa_dokter' => 'required',
            'biaya_tindakan' => 'required',
            'biaya_obat' => 'required',
        ]);

        $total = $request->jasa_dokter + $request->biaya_tindakan + $request->biaya_obat;

        $pembayaran->id_pemeriksaan = $request->id_pemeriksaan;
        $pembayaran->jasa_dokter = $request->jasa_dokter;
        $pembayaran->biaya_tindakan = $request->biaya_tindakan;
        $pembayaran->biaya_obat = $request->biaya_obat;
        $pembayaran->total = $total;
        $pembayaran->save();

        return back()->with('success', 'Berhasil menambahkan data pembayaran baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_pembayaran', [
            "judul" => "Pembayaran Pasien",

            "pembayaran" => Pembayaran::join('pemeriksaans', 'pembayarans.id_pemeriksaan', '=', 'pemeriksaans.id', 'right')->join('pendaftarans', 'pendaftarans.id', '=', 'pemeriksaans.id_pendaftaran', 'left')->join('tindakans', 'pemeriksaans.id_tindakan', '=', 'tindakans.id', 'left')->join('pasiens', 'pendaftarans.id_pasien', '=', 'pasiens.id')->join('polis', 'pendaftarans.id_poli', '=', 'polis.id')->join('pegawais', 'pendaftarans.id_dokter', '=', 'pegawais.id')->join('obats', 'pemeriksaans.id_obat', '=', 'obats.id')->where('pemeriksaans.id', $id)->select('pemeriksaans.*', 'obats.nama_obat', 'obats.harga as harga_obat', 'pasiens.nama as nama_pasien', 'pendaftarans.keluhan', 'pasiens.usia', 'pendaftarans.tanggal', 'tindakans.tindakan', 'pegawais.nama as nama_dokter', 'pemeriksaans.id as id_pemeriksaan', 'pembayarans.id as id_pembayaran', 'pendaftarans.jenis_layanan', 'pasiens.keterangan', 'pembayarans.jasa_dokter', 'pembayarans.biaya_tindakan', 'pembayarans.total')->first(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembayaranRequest  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pembayaran = new Pembayaran;

        $request->validate([
            'jasa_dokter' => 'required',
            'biaya_tindakan' => 'required',
            'biaya_obat' => 'required',
        ]);

        $total = $request->jasa_dokter + $request->biaya_tindakan + $request->biaya_obat;

        $cek_pembayaran = Pembayaran::findOrFail($id);

        $cek_pembayaran->jasa_dokter = $request->jasa_dokter;
        $cek_pembayaran->biaya_tindakan = $request->biaya_tindakan;
        $cek_pembayaran->biaya_obat = $request->biaya_obat;
        $cek_pembayaran->total = $total;
        $cek_pembayaran->save();

        return back()->with('success', 'Update Data Pembayaran berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
