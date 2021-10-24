<?php

namespace App\Http\Controllers;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;

use App\Models\BookmarkersCompany;
use App\Models\Task;
use App\Models\User;
use App\Models\Events;
use Illuminate\Http\Request;
use Auth;


Use \Carbon\Carbon;
use PDF;
use EloquentBuilder;
use App\Charts\CompanyChart;

use App\Models\AuditLog;
use App\Models\AuditLogins;
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
      $loggedid=Auth::guard('web')->user()->id;
      $loggedid=Auth::guard('web')->user()->id;
      $publiclotteries = PublicLottery::where('id', Auth::guard('web')->user()->id)->get();
        $bookmarkers = BookMarkers::where('id', Auth::guard('web')->user()->id)->get();
        $publicgamings = Publicgamings::where('id', Auth::guard('web')->user()->id)->get();
       
        $users = User::with('usertypesusers')->with('departmentsusers')->where('id',$loggedid)->pluck('user_types_id');
   
        $activitylogs = EloquentBuilder::to(AuditLog::latest()->with('userlogs')->where('id',$users[0])->take('5'),request()->all())->get();
        $auditLogs = EloquentBuilder::to(AuditLogins::latest()->with('userlogins')->where('user_types_id',$users[0])->take('5'),request()->all())->get();
        $events= Events::all();
        $auth= Auth::user()->id;
      //  $todoes = Task::where('id',$auth)->where('status','!=','Seen')->get();
        $todoes = Task::where('id',$auth)->latest()->take('5')->get();
    
        //return view('vuexy.admin-dashboard', compact('activitylogs','auditLogs','publiclotteries','bookmarkers','publicgamings'));



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

      //  if($users[0] == 1 || $users[0] == '1')
///////////////////////////////////////////////////////
////////////////////////////////////////////////////////
/////////////////publiclottery_ggr_graph////////////////////////////////////////


$companies =EloquentBuilder::to(BookmarkersCompany::with('publicLotterycompany'), request()->all())->where('category_type_id',2)->get();
        
$labels_arr = [];
$data_arr = [];
foreach($companies as $company)
{
    array_push($labels_arr,$company->company_name);
    array_push($data_arr,$company->publicLotterycompany->sum('ggr'));
}
// $labels_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('licensee_name');
// $data_arr = EloquentBuilder::to(BookMarkers::with('bookmarkerscompany'),request()->all())->pluck('ggr');
// chart
$borderColors = [ "#30ba35", "#f25961" ];
$fillColors = ["#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d","#fdaf4b","#59d05d" ];
$publiclotteryggrchart = new CompanyChart;
$publiclotteryggrchart->minimalist(false);
$publiclotteryggrchart->labels($labels_arr);
$publiclotteryggrchart->dataset('Company GGR Reports', 'bar', $data_arr)
// ->color($borderColors)
->backgroundcolor($fillColors);


///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
      //  return $users[0];
    
        if((int)$users[0] == 1)
        {
              return view('vuexy.dash.admin-dashboard', compact('publiclotteryggrchart','companyggrchart','activitylogs','auditLogs','publiclotteries','bookmarkers','publicgamings','todoes','events'));
        }
        elseif((int)$users[0] == 2)
        {
       return view('home', compact('publiclotteries','bookmarkers','publicgamings'));

        }
     


       if ($users == "1") {
        return  $users;

    } elseif ($users == '2') {
      return view('home', compact('publiclotteries','bookmarkers','publicgamings','todoes','users'));

    }




       
    }


    public function companyGGr()
    {
           }




}


