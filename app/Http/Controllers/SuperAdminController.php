<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Auth;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('super-admin-dashboard');
    }

    public function index()
    {
        //
    }

}
