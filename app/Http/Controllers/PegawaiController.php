<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\StorePegawaiRequest;
// use App\Http\Requests\UpdatePegawaiRequest;
use App\Models\Pegawai;
use App\Models\Poli;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pegawai', [
            "judul" => "Input data Pegawai",
            "pegawai" => Pegawai::join('polis', 'pegawais.poli', '=', 'polis.id')->get(['pegawais.*', 'polis.poli as nama_poli', 'polis.id as id_poli']),
            "poli" => Poli::all()
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
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'poli' => 'required',
            'password' => 'required',
        ]);

        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->telp = $request->telp;
        $pegawai->alamat = $request->alamat;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->agama = $request->agama;
        $pegawai->poli = $request->poli;
        $pegawai->password = Hash::make($request->password);
        $pegawai->save();

        return back()->with('success', 'Berhasil menambahkan data pegawai baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        return view('admin/edit_pegawai', [
            "judul" => "Edit data Pegawai",
            "pegawai" => Pegawai::join('polis', 'pegawais.poli', '=', 'polis.id')->where('pegawais.id', $id)->select('pegawais.*', 'polis.poli as nama_poli')->first(),
            "poli" => Poli::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = new Pegawai;

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'poli' => 'required',
            // 'password' => 'required',
        ]);

        $cek_pegawai = Pegawai::findOrFail($id);

        if (!empty($request->password)) {
            $cek_pegawai->password = Hash::make($request->password);
        }

        $cek_pegawai->nama = $request->nama;
        $cek_pegawai->email = $request->email;
        $cek_pegawai->telp = $request->telp;
        $cek_pegawai->alamat = $request->alamat;
        $cek_pegawai->tanggal_lahir = $request->tanggal_lahir;
        $cek_pegawai->agama = $request->agama;
        $cek_pegawai->poli = $request->poli;
        $cek_pegawai->save();

        return back()->with('success', 'Update Data Pegawai berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        return back()->with('success', ' Penghapusan Pegawai berhasil.');
    }
}
