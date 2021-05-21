<?php

namespace App\Http\Controllers;
use App\Models\ActiveStatusType;
use App\Models\CategoryTypes;
use Illuminate\Http\Request;

class CategoryTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorytypes = CategoryTypes::all();
        return view('vuexy.categorytype.index', compact('categorytypes'));
        
    }



    //return CategoryTypes
    public function CategoryTypes()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            $categoryTypes = CategoryTypes::all();
            return $categoryTypes;
        }
    }
    
    //return StatusTypeNam
    public function StatusTypeNam()
    {
       // if(Auth::user()->user_type == 'organization_user' || Auth::user()->user_type == 'organization')
        {
            $StatusTypeNam = ActiveStatusType::all();
            return $StatusTypeNam;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTypes  $categoryTypes
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTypes $categoryTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTypes  $categoryTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTypes $categoryTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryTypes  $categoryTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryTypes $categoryTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTypes  $categoryTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTypes $categoryTypes)
    {
        //
    }
}
