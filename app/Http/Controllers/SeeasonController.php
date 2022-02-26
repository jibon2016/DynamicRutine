<?php

namespace App\Http\Controllers;

use App\Models\Seeason;
use App\Http\Requests\StoreSeeasonRequest;
use App\Http\Requests\UpdateSeeasonRequest;

class SeeasonController extends Controller
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
     * @param  \App\Http\Requests\StoreSeeasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeeasonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seeason  $seeason
     * @return \Illuminate\Http\Response
     */
    public function show(Seeason $seeason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seeason  $seeason
     * @return \Illuminate\Http\Response
     */
    public function edit(Seeason $seeason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeeasonRequest  $request
     * @param  \App\Models\Seeason  $seeason
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeeasonRequest $request, Seeason $seeason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seeason  $seeason
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seeason $seeason)
    {
        //
    }
}
