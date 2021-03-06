<?php

namespace App\Http\Controllers;

use App\Models\Publicgamings;
use App\Models\PublicLottery;
use Illuminate\Http\Request;

class AdminPublicgamingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publiclotteries = PublicLottery::all();
        return view('publicgaming.admin', compact('publiclotteries'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicgamings  $publicgamings
     * @return \Illuminate\Http\Response
     */
    public function show(Publicgamings $publicgamings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicgamings  $publicgamings
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicgamings $publicgamings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicgamings  $publicgamings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicgamings $publicgamings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicgamings  $publicgamings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicgamings $publicgamings)
    {
        //
    }
}
