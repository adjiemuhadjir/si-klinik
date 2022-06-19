<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\StoreWilayahRequest;
use App\Http\Requests\UpdateWilayahRequest;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/wilayah', [
            "judul" => "Input data wilayah",
            "wilayah" => Wilayah::all()
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
     * @param  \App\Http\Requests\StoreWilayahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah;

        $request->validate([
            'nama_wilayah' => 'required',
        ]);

        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->save();

        return back()->with('success', 'Berhasil menambahkan wilayah baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_wilayah', [
            "judul" => "Edit Wilayah",
            "wilayah" => Wilayah::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWilayahRequest  $request
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_wilayah' => 'required',
        ]);

        $cek_wilayah = Wilayah::findOrFail($id);

        $cek_wilayah->nama_wilayah = $request->nama_wilayah;
        $cek_wilayah->save();

        return back()->with('success', 'Update Wilayah berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::find($id);
        $wilayah->delete();

        return back()->with('success', ' Penghapusan Wilayah berhasil.');
    }
}
