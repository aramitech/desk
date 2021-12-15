<?php

namespace App\Http\Controllers;
use App\Models\Shops;
use App\Models\BookmarkersCompany;

use Illuminate\Http\Request;

class ShopController extends Controller
{
   
    
    public function index()
    {
          $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
           $shops = Shops::with('Shopcompany')->where('category_type_id',1)->get();
        return view('shop.old', compact('shops'));
    }
    
    public function shopindex()
    {
          $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
           $shops = Shops::with('Shopcompany')->where('category_type_id',1)->get();
        return view('vuexy.shop.index', compact('shops'));
    }


    
    public function shop_numbers($id)
    {
          $shop_id=BookmarkersCompany::where('category_type_id',1)->pluck('category_type_id');
         $shops = Shops::with('Shopcompany')->where('category_type_id',1)->where('company_id',$id)->get();
        return view('vuexy.shop.index', compact('shops'));
    }


    public function publicgaming_shop()
    {
        $shop_id=BookmarkersCompany::where('category_type_id',3)->pluck('category_type_id');
        $shops = Shops::with('Shopcompany')->where('category_type_id',$shop_id)->get();
        return view('shop.publicgaming_shop', compact('shops'));
    }
    public function publiclottery_shop()
    {
        $shop_id=BookmarkersCompany::where('category_type_id',2)->pluck('category_type_id');
        $shops = Shops::with('Shopcompany')->where('category_type_id',$shop_id)->get();
        return view('shop.publiclottery_shop', compact('shops'));
    }

    public function shopdata()
    {
        $shops = Shops::all();
        return view('shop.index', compact('shops'));
    }

 //return getLicenseeName
 public function getLicenseeName()
 {
    // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
     {
         //$category_typea23q_id = CategoryTypes::where('categorytypes_id','1')->with('CompanyCategoryType')->get();
         $license_name = BookmarkersCompany::with('Shopcompany')->where('category_type_id',1)->get();
         return $license_name;
     }
 }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $user = new Shops();
        $user->company_id = $request->company_id['company_id'];
        $user->category_type_id = $request->category_type_id;
        
        $user->shop_name = $request->shop_name;
        $user->location = $request->location;
        $user->shop_number = $request->shop_number;
        $user->lrnumber = $request->lrnumber;
        $user->status = $request->status;

        
        $user->save();  
        return back()->with('success','Added succesfully');
    }
    public function update(Request $request)
    {
        $request->validate([
      
        ]);
        $user = Shops::findOrFail($request->shop_id);
       // $user->company_id = $request->company_id['company_id'];
        $user->category_type_id = $request->category_type_id;
        $user->shop_name = $request->shop_name;
        $user->location = $request->location;
        $user->save();

        return back()->with('success','Updated succesfully');
    }

    public function destroy(Request $request )
    {
       // return $request->id['shop_id'];
       // return $request;     return Favourite::find($id)->delete();
        $user = Shops::findOrFail($request->id['shop_id']);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }


    public function death(Request $request, $id )
    {

        
       // return $request->id['shop_id'];
       // return $request;     return Favourite::find($id)->delete();
        $id;  $user = Shops::findOrFail( $id );
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }

}
