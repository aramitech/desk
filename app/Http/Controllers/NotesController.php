<?php

namespace App\Http\Controllers;
use App\Models\Notes;
use App\Models\BookmarkersCompany;

use Illuminate\Http\Request;

class NotesController extends Controller
{
   
    
    public function index()
    {
        $notes = Notes::all();
        return view('vuexy.admin.notes', compact('notes'));
    }
    
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $user = new Notes();
        $user->id = '1';
        $user->note = $request->note;
        $user->save();  
        return back()->with('success','Added succesfully');
    }
    public function update(Request $request)
    {
        $request->validate([
      
        ]);
        $user = Shops::findOrFail($request->shop_id);
        $user->company_id = $request->company_id['company_id'];
        $user->category_type_id = $request->category_type_id;
        $user->shop_name = $request->shop_name;
        $user->location = $request->location;
        $user->save();

        return back()->with('success','Updated succesfully');
    }

    public function delete($id )
    {
       // return $request->id['shop_id'];
       // return $request;     return Favourite::find($id)->delete();
        $user = Notes::findOrFail($id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }

}
