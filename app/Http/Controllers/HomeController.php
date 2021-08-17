<?php

namespace App\Http\Controllers;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $publiclotteries = PublicLottery::where('id', Auth::guard('web')->user()->id)->get();
        $bookmarkers = BookMarkers::where('id', Auth::guard('web')->user()->id)->get();
        $publicgamings = Publicgamings::where('id', Auth::guard('web')->user()->id)->get();
         return view('home', compact('publiclotteries','bookmarkers','publicgamings'));
    }
}
