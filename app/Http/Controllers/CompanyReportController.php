<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\BookmarkersCompany;
use App\Models\PublicLotteryNumber;
use App\Models\Shops;
use App\Models\PublicGamingCompany;
use Illuminate\Http\Request;

class CompanyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
///=================================================================================
///=================================================================================
///=================================================================================
    public function bookmarkers_company_report()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }

    
    public function companystatusActive()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->where('status','Active')->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }

    public function companystatusBlocked()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->where('status','Blocked')->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }

    public function companystatusdeactivated()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->where('status','Deactivated')->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }
    
    

    public function companystatusHavePayBill()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->where('paybillno','!=',NULL)->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }
    
    public function companystatusNoPayBill()
    {
        //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->with('Shopcompany')->where('category_type_id','1')->where('paybillno',NULL)->OrderBy('category_type_id')->get();
        return view('vuexy.companyreport.bookmarkers', compact('bookmarkers'));
    }
    
///=================================================================================
///=================================================================================
///=================================================================================

public function publiclottery_company_report()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}

public function publiclotterycompanystatusActive()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->where('status','Active')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}

public function publiclotterycompanystatusBlocked()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->where('status','Blocked')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}

public function publiclotterycompanystatusdeactivated()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->where('status','Deactivated')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}



public function publiclotterycompanystatusHavePayBill()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->where('paybillno','!=',NULL)->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}

public function publiclotterycompanystatusNoPayBill()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','2')->where('paybillno',NULL)->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publiclottery', compact('bookmarkers'));
}


///=================================================================================
///=================================================================================
///=================================================================================

public function publicgaming_company_report()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}

public function publicgamingcompanystatusActive()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->where('status','Active')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}

public function publicgamingcompanystatusBlocked()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->where('status','Blocked')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}

public function publicgamingcompanystatusdeactivated()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->where('status','Deactivated')->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}



public function publicgamingcompanystatusHavePayBill()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->where('paybillno','!=',NULL)->OrderBy('category_type_id')->get();
    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}

public function publicgamingcompanystatusNoPayBill()
{
    //        $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','1')->OrderBy('category_type_id')->get();
    $bookmarkers = BookmarkersCompany::with('CompanyCategoryType')->where('category_type_id','3')->where('paybillno',NULL)->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();

    return view('vuexy.companyreport.publicgaming', compact('bookmarkers'));
}


///=================================================================================
///=================================================================================
///=================================================================================


public function bookmarkers_shop_report()
{
    $bookmarkers = Shops::with('Shopcompany')->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();
    return view('vuexy.companyreport.shopbookmarkers', compact('bookmarkers','bookmarkerscompanynames'));
}



public function shopcompanystatus()
{
    $bookmarkers = Shops::with('Shopcompany')->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();

    return view('vuexy.companyreport.shopbookmarkers', compact('bookmarkers','bookmarkerscompanynames'));
}

public function shopcompanystatusActive()
{
    $bookmarkers = Shops::with('Shopcompany')->where('status','Active')->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();
    return view('vuexy.companyreport.shopbookmarkers', compact('bookmarkers','bookmarkerscompanynames'));
}

public function shopcompanystatusBlocked()
{
    $bookmarkers = Shops::with('Shopcompany')->where('status','Blocked')->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();
    return view('vuexy.companyreport.shopbookmarkers', compact('bookmarkers','bookmarkerscompanynames'));
}

public function shopcompanystatusdeactivated()
{
    $bookmarkers = Shops::with('Shopcompany')->where('status','Deactivated')->OrderBy('category_type_id')->get();
    $bookmarkerscompanynames = BookmarkersCompany::where('category_type_id','1')->get();
    return view('vuexy.companyreport.shopbookmarkers', compact('bookmarkers','bookmarkerscompanynames'));
}


///=================================================================================
///=================================================================================
///=================================================================================


public function lotterynumbershop()
{
    $bookmarkers = PublicLotteryNumber::with('Lotteryshopnumber')->get();
    return view('vuexy.companyreport.lotterynumbershop', compact('bookmarkers'));
}


}
