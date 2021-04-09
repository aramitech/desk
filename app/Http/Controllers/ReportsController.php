<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookMarkers;
use App\Models\PublicLottery;
use App\Models\Publicgamings;
use App\Models\BookmarkersCompany;
use Illuminate\Http\Request;
use Auth;
use Hash;
Use \Carbon\Carbon;
use PDF;
use EloquentBuilder;
use App\Charts\CompanyChart;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('reports.company_ggr',compact('companyggrchart'));
    }

   ////////////======//Public Lottery ggr reposrt////===////////
   public function publiclotteryGGr()
   {
       $companies =EloquentBuilder::to(BookmarkersCompany::whereHas('publicLotterycompany', function($query){
           // $query->select('ggr')->where('ggr','!=',0);
       })->with('publicLotterycompany'), request()->all())->get();

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
       $publiclotteryggrchart = new CompanyChart;
       $publiclotteryggrchart->minimalist(false);
       $publiclotteryggrchart->labels($labels_arr);
       $publiclotteryggrchart->dataset('Company GGR Reports', 'bar', $data_arr)
       // ->color($borderColors)
       ->backgroundcolor($fillColors);
       return view('reports.publiclottery_ggr_graph',compact('publiclotteryggrchart'));
   }

   ////////////======//Public Lottery ggr reposrt////===////////
   public function publicGamingGGr()
   {
       $companies =EloquentBuilder::to(BookmarkersCompany::whereHas('publicGamingcompany', function($query){
           // $query->select('ggr')->where('ggr','!=',0);
       })->with('publicGamingcompany'), request()->all())->get();

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
       $publicgamingggrchart = new CompanyChart;
       $publicgamingggrchart->minimalist(false);
       $publicgamingggrchart->labels($labels_arr);
       $publicgamingggrchart->dataset('Public Gaming Company GGR Reports', 'bar', $data_arr)
       // ->color($borderColors)
       ->backgroundcolor($fillColors);
       return view('reports.publicgaming_ggr_graph',compact('publicgamingggrchart'));
   }



   ////////////======//Public Gaming All ggr reposrt////===////////
   public function publicGamingGGrAll()
   {
       $companies =EloquentBuilder::to(BookmarkersCompany::whereHas('publicGamingcompany', function($query){
           // $query->select('ggr')->where('ggr','!=',0);
       })->with('publicGamingcompany'), request()->all())->get();

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
       $publicgamingggrchart = new CompanyChart;
       $publicgamingggrchart->minimalist(false);
       $publicgamingggrchart->labels($labels_arr);
       $publicgamingggrchart->dataset('Public Gaming Company GGR Reports', 'bar', $data_arr)
       // ->color($borderColors)
       ->backgroundcolor($fillColors);
       return view('reports.all_publicgaming_ggr_graph',compact('publicgamingggrchart'));
   }




    public function index()
    {
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->get();
        return view('reports.index', compact('bookmarkers'));
    }


    public function bookmarkersreport($id)
    {

         $company_name=BookmarkersCompany::all('company_name');
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->where('company_name',$company_name)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $bookmarkers = EloquentBuilder::to(BookMarkers::where('company_id',$id), request()->all())->get();
        return view('reports.bookmarkers', compact('bookmarkers','bcompanies','id'));
    }

    public function bookmarkersAllreport($id)
    {

         $company_name=BookmarkersCompany::all('company_name');
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $bookmarkers = EloquentBuilder::to(BookMarkers::where('bookmarker_id','!=',NULL))->get();
        return view('reports.bookmarkers', compact('bookmarkers','bcompanies','id'));
    }


    public function publiclotteryAllreport($id)
    {

         $company_name=BookmarkersCompany::all('company_name');
       // $bookmarkers = BookmarkersCompany::where('category_type_id',1)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $publiclotteryAllreports = EloquentBuilder::to(PublicLottery::where('publiclottery_id','!=',NULL), request()->all())->get();
        return view('reports.publiclotteryAllreport', compact('publiclotteryAllreports','bcompanies','id'));
    }


    public function gamingsAllreport($id)
    {

         $company_name=BookmarkersCompany::all('company_name');
       // $bookmarkers = BookmarkersCompany::where('category_type_id',1)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $gamingsAllreports = EloquentBuilder::to(Publicgamings::where('publicgaming_id','!=',NULL), request()->all())->get();
        return view('reports.gamingsAllreport', compact('gamingsAllreports','bcompanies','id'));
    }



    public function reportsview_publiclottery($id)
    {

        $company_name=BookmarkersCompany::all('company_name');
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->where('company_name',$company_name)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $publicLotteries = EloquentBuilder::to(PublicLottery::where('company_id',$id), request()->all())->get();
        return view('reports.publiclottery', compact('publicLotteries','bcompanies','id'));
    }


    public function reportsview_publicgaming($id)
    {

        $company_name=BookmarkersCompany::all('company_name');
        $bookmarkers = BookmarkersCompany::where('category_type_id',1)->where('company_name',$company_name)->get();
    
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $publicgamings = EloquentBuilder::to(Publicgamings::where('company_id',$id), request()->all())->get();
        return view('reports.reportsview_publicgaming', compact('publicgamings','bcompanies','id'));
    }


    public function createPDF($id) {
        // retreive all records from db
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $bookmarkers = EloquentBuilder::to(BookMarkers::where('company_id',$id), request()->all())->get();
        $from= request()->get('from');
        $to= request()->get('to');
        // share data to view
        // view()->share('BookMarkers',$bcompanies,$bookmarkers,$id);
        $pdf = PDF::loadView('reports.pdf_view', compact('bcompanies','bookmarkers','id','from','to'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');

    }


    public function puliclottery_createPDF($id) {
        // retreive all records from db
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $publicLotteries = EloquentBuilder::to(PublicLottery::where('company_id',$id), request()->all())->get();
  
        // share data to view
        // view()->share('BookMarkers',$bcompanies,$bookmarkers,$id);
        $pdf = PDF::loadView('reports.pdf_publiclottery_view', compact('bcompanies','publicLotteries','id'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');

    }
    
    public function publicgaming_createPDF($id) {
        // retreive all records from db
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        $publicgamings = EloquentBuilder::to(Publicgamings::where('company_id',$id), request()->all())->get();
  
        // share data to view
        // view()->share('BookMarkers',$bcompanies,$bookmarkers,$id);
        $pdf = PDF::loadView('reports.pdf_publicgaming_view', compact('bcompanies','publicgamings','id'));
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');

    }


    public function bookmarkersAllreport_createPDF($id) {
        // retreive all records from db
        $bcompanies = BookmarkersCompany::where('company_id',$id)->get();
        //$bookmarkers = EloquentBuilder::to(BookMarkers::where('company_id',$id), request()->all())->get();

        $bookmarkers = EloquentBuilder::to(BookMarkers::where('company_id','!=','ttt888uu'), request()->all())->get();
  
        // share data to view
        // view()->share('BookMarkers',$bcompanies,$bookmarkers,$id);    '!=',NULL
        $pdf = PDF::loadView('reports.pdf_bookmarkersAll_view', compact('bcompanies','bookmarkers','id'));
  
        // download PDF file with download method
        return $pdf->download('pdf_bookmarkersAll_view.pdf');

    }
 
    public function indexpubliclottery()
    {
        $publiclotteries = BookmarkersCompany::where('category_type_id',2)->get();
        return view('reports.indexpubliclottery', compact('publiclotteries'));
    }
    public function publiclotterysreport()
    {
        $bcompanies = BookmarkersCompany::where('category_type_id',2)->get();
        $bookmarkers = BookMarkers::all();
        return view('reports.publiclottery', compact('bookmarkers','bcompanies'));
    }


    public function indexpublicgaming()
    {
        $publicgamings = BookmarkersCompany::where('category_type_id',3)->get();
        return view('reports.publicgaming', compact('publicgamings'));
    }
    public function publicgamingreport() 
    {
        $bcompanies = BookmarkersCompany::where('category_type_id',3)->get();
        $bookmarkers = BookMarkers::all();
        return view('reports.publicgaming', compact('bookmarkers','bcompanies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Added succesfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Updated succesfully');
    }

    public function updaterole(Request $request)
    {
    
        $user = User::findOrFail($request->id);
        $user->editstatus = $request->editstatus;
        $user->deletestatus = $request->deletestatus;
        $user->bookmarkersstatus = $request->bookmarkersstatus;
        $user->publiclotterystatus = $request->publiclotterystatus;
        $user->publicgamingstatus = $request->publicgamingstatus;
 
        $user->save();
        return back()->with('success','Role Updated succesfully');
    }


    
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }


    public function profile()
    {
        $auth=Auth::user()->email; 
        $users = User::where('email',$auth)->get();
        return view('profile.index', compact('users'));
    }

}
