<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Wilayah;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/user', [
            "judul" => "Input data User",
            "user" => User::join('pegawais', 'users.id_pegawai', '=', 'pegawais.id')->join('wilayahs', 'users.id_wilayah', '=', 'wilayahs.id')->get(['users.id', 'users.role', 'pegawais.nama', 'wilayahs.id as id_wilayah', 'wilayahs.nama_wilayah', 'pegawais.id as id_pegawai']),
            "pegawai" => Pegawai::all(),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $request->validate([
            'id_pegawai' => 'required',
            'role' => 'required',
            'id_wilayah' => 'required',
        ]);

        $user->id_pegawai = $request->id_pegawai;
        $user->role = $request->role;
        $user->id_wilayah = $request->id_wilayah;
        $user->save();

        return back()->with('success', 'Berhasil menambahkan data User baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        return view('admin/edit_user', [
            "judul" => "Edit data User",
            "user" => User::join('pegawais', 'users.id_pegawai', '=', 'pegawais.id')->join('wilayahs', 'users.id_wilayah', '=', 'wilayahs.id')->where('users.id', $id)->select('users.id', 'users.role', 'pegawais.nama', 'wilayahs.id as id_wilayah', 'wilayahs.nama_wilayah', 'pegawais.id as id_pegawai')->first(),
            "pegawai" => Pegawai::all(),
            "wilayah" => Wilayah::all()
        ]);
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
        $user = new User;

        $request->validate([
            'id_pegawai' => 'required',
            'role' => 'required',
            'id_wilayah' => 'required',
        ]);

        $cek_user = User::findOrFail($id);

        $cek_user->id_pegawai = $request->id_pegawai;
        $cek_user->role = $request->role;
        $cek_user->id_wilayah = $request->id_wilayah;
        $cek_user->save();

        return back()->with('success', 'Update Data User berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('success', ' Penghapusan User berhasil.');
    }
}
