<?php

namespace App\Http\Controllers;
use App\Models\Events;

use Illuminate\Http\Request;

class EventsController extends Controller
{
   
    
    public function index()
    {
        $notes = Events::all();
        return view('vuexy.admin.notes', compact('notes'));
    }
    
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $user = new Events();
        $user->event_title =$request->event_title;
        $user->start_date = $request->start_date;
        $user->end_date = $request->end_date;
        $user->description = $request->description;
        $user->save();  
        return back()->with('success','Added succesfully');
    }
    public function update(Request $request)
    {
        $request->validate([
      
        ]);
        $user = Events::findOrFail($request->shop_id);
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
        $user = Events::findOrFail($id);
        $user->delete();
        return back()->with('success','Deleted succesfully');
    }

}
