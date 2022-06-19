<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\StorePoliRequest;
use App\Http\Requests\UpdatePoliRequest;
use App\Models\Poli;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/poli', [
            "judul" => "Input data poli",
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
     * @param  \App\Http\Requests\StorePoliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poli = new Poli;

        $request->validate([
            'poli' => 'required',
        ]);

        $poli->poli = $request->poli;
        $poli->save();

        return back()->with('success', 'Berhasil menambahkan poli baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/edit_poli', [
            "judul" => "Edit Poli",
            "poli" => Poli::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePoliRequest  $request
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poli' => 'required',
        ]);

        $cek_poli = Poli::findOrFail($id);

        $cek_poli->poli = $request->poli;
        $cek_poli->save();

        return back()->with('success', 'Update Poli berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poli = Poli::find($id);
        $poli->delete();

        return back()->with('success', ' Penghapusan Poli berhasil.');
    }
}
