<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\BookmarkersCompany;
use App\Models\Admin;
use Auth;

use Hash;
Use \Carbon\Carbon;
use PDF;
use EloquentBuilder;
use App\Charts\CompanyChart;

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


        $companies =EloquentBuilder::to(BookmarkersCompany::whereHas('bookmarkerscompany', function($query){
            // $query->select('ggr')->where('ggr','!=',0);
        })->with('bookmarkerscompany'), request()->all())->get();

        $labels_arr = [];
        $data_arr = [];
        foreach($companies as $company)
        {
            array_push($labels_arr,$company->company_name);
            array_push($data_arr,$company->bookmarkerscompany->sum('ggr'));
        }
        // $labels_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('licensee_name');
        // $data_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('ggr');
        // chart
        $borderColors = [ "#30ba35", "#f25961" ];
        $fillColors = ["#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d" ];
        $companyggrchart = new CompanyChart;
        $companyggrchart->minimalist(false);
        $companyggrchart->labels($labels_arr);
        $companyggrchart->dataset('Company GGR Reports', 'bar', $data_arr)
        // ->color($borderColors)
        ->backgroundcolor($fillColors);




        $publiclotteries = PublicLottery::all();
        $bookmarkers = BookMarkers::all();
        return view('admin-dashboard', compact('publiclotteries','bookmarkers','companyggrchart'));
       // return view('admin-dashboard');
    }


        ////////////======//company ggr reposrt////===////////
        public function companyGGr()
        {
            $companies =EloquentBuilder::to(BookmarkersCompany::whereHas('bookmarkerscompany', function($query){
                // $query->select('ggr')->where('ggr','!=',0);
            })->with('bookmarkerscompany'), request()->all())->get();
    
            $labels_arr = [];
            $data_arr = [];
            foreach($companies as $company)
            {
                array_push($labels_arr,$company->company_name);
                array_push($data_arr,$company->bookmarkerscompany->sum('ggr'));
            }
            // $labels_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('licensee_name');
            // $data_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('ggr');
            // chart
            $borderColors = [ "#30ba35", "#f25961" ];
            $fillColors = ["#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d" ];
            $companyggrchart = new CompanyChart;
            $companyggrchart->minimalist(false);
            $companyggrchart->labels($labels_arr);
            $companyggrchart->dataset('Company GGR Reports', 'bar', $data_arr)
            // ->color($borderColors)
            ->backgroundcolor($fillColors);
            return view('admin-dashboard',compact('companyggrchart'));
        }


            public function master()
        {
            //
            $publiclotteries = PublicLottery::with('publicLotterycompany')->get();
            return view('vuexy.vuexy-dashboard', compact('publiclotteries'));
        }

        public function accountsetting()
        {
            //
            $admins = Admin::all();
            return view('vuexy.admin.account_settings', compact('admins'));
        }

        
}
