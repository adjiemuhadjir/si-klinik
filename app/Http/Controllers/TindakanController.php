<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTindakanRequest;
use App\Http\Requests\UpdateTindakanRequest;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/tindakan', [
            "judul" => "Input data tindakan",
            "tindakan" => Tindakan::all()
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
     * @param  \App\Http\Requests\StoreTindakanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tindakan = new Tindakan;

        $request->validate([
            'tindakan' => 'required',
        ]);

        $tindakan->tindakan = $request->tindakan;
        $tindakan->save();

        return back()->with('success', 'Berhasil menambahkan tindakan baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_tindakan', [
            "judul" => "Edit tindakan",
            "tindakan" => Tindakan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTindakanRequest  $request
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tindakan' => 'required',
        ]);

        $cek_tindakan = Tindakan::findOrFail($id);

        $cek_tindakan->tindakan = $request->tindakan;
        $cek_tindakan->save();

        return back()->with('success', 'Update Tindakan berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tindakan = Tindakan::find($id);
        $tindakan->delete();

        return back()->with('success', ' Penghapusan Tindakan berhasil.');
    }
}
