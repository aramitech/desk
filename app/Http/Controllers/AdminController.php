<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $publiclotteries = PublicLottery::all();
        $bookmarkers = BookMarkers::all();
        return view('admin-dashboard', compact('publiclotteries','bookmarkers'));
       // return view('admin-dashboard');
    }

}
