<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\BookmarkersCompany;
use App\Models\CategoryTypes;
use App\Models\Admin;
use App\Models\Notes;
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
            //get barchart data
            $companies =EloquentBuilder::to(BookmarkersCompany::with(['bookmarkerscompany' => function($query){
                if(request()->has('date') == 1){
                    $query->whereDate('created_at','>=',now()->subDays(28));
                }
                elseif(request()->has('month') == 1){
                    $query->whereDate('created_at','>=',now()->subMonth(1));
                }
                elseif(request()->has('year') == 1){
                    $query->whereDate('created_at','>=',now()->subYear(1));
                }
                else {
                    $query->whereDate('created_at','>=',now()->subDays(7));
                }
            }]), request()->all())->get();
            // return $companies;
            $data_arr['companies'] = [];
            $data_arr['ggr'] = [];
            foreach($companies as $company)
            {
                if($company->bookmarkerscompany->count() > 0){
                    array_push($data_arr['companies'],$company->company_name);
                    array_push($data_arr['ggr'],$company->bookmarkerscompany->sum('ggr'));
                }
            }
            //company status
            $companyactive =BookmarkersCompany::where('status','Active')->count();
            $companyinactive =BookmarkersCompany::where('status','Not Active')->count();
            $publiclotteries = PublicLottery::with('publicLotterycompany')->get();
            // get company by category count
            $categories = CategoryTypes::with('CompanyCategoryType')->get();
            $catcompany = $categories->pluck('categorytype');
            $catcompanies = [];
            foreach($categories as $cat)
            {
                array_push($catcompanies,$cat->CompanyCategoryType->count());
            }
            $categories =['category' => $catcompany, 'companycount' => $catcompanies];
            return view('vuexy.vuexy-dashboard', compact('categories','publiclotteries','data_arr','companyactive','companyinactive'));
        }

        public function accountsetting()
        {
            //
            $notes = Notes::all();
            $loggedinuser=Auth::guard('admin')->user()->admin_id;
            $admins = Admin::where('admin_id',$loggedinuser)->get();
            return view('vuexy.admin.account_settings', compact('admins','notes'));
        }

        public function accountsettingchangepassword()
        {
            //
            $notes = Notes::all();
            $loggedinuser=Auth::guard('admin')->user()->admin_id;
            $admins = Admin::where('admin_id',$loggedinuser)->get();
            return view('vuexy.admin.changepassword', compact('admins','notes'));
        } 
}
