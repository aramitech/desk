<?php

namespace App\Http\Controllers;

use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\BookMarkers;
use Illuminate\Http\Request;

class ReturnFormReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publiclottery()
    {
        //
        $publiclotteries = PublicLottery::all();
        return view('return_form_reports.publiclottery', compact('publiclotteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Publicgamings()
    {
        //
        $publiclotteries = publiclottery::all();
        return view('return_form_reports.publicgaming', compact('publiclotteries'));

    }

    public function bookmarkers()
    {
        //
        $bookmarkers = BookMarkers::all();
        return view('return_form_reports.bookmarkers', compact('bookmarkers'));
    }
}
