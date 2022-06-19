<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignaRequest;
use App\Http\Requests\UpdateSignaRequest;
use App\Models\Signa;

class SignaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSignaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signa  $signa
     * @return \Illuminate\Http\Response
     */
    public function show(Signa $signa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Signa  $signa
     * @return \Illuminate\Http\Response
     */
    public function edit(Signa $signa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignaRequest  $request
     * @param  \App\Models\Signa  $signa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignaRequest $request, Signa $signa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signa  $signa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signa $signa)
    {
        //
    }
}
