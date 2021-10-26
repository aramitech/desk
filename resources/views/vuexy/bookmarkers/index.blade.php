@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->records_bookmarkers_r;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->records_bookmarkers_r;
                }
            
                @endphp


@extends('vuexy.layouts.master3')
@section('title')
    Admin
@endsection
@section('content')
<div id="app">
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <br><br><br>

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                 
				 
				 
				 
				 
				 
				 
				           <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                               		
                                @include('layouts.messages')
    @include('layouts.errors')


    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
<H2 >BOOKMARKERS LIST  </H2></a>

</li></ul>


        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addbookmarkers" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Record </i>
                    </a>

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#uploadbookmarkers" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-upload" aria-hidden="true">Upload Record</i>    
                    </a>
                </div>
            </div>


           <!-- check user type logged in -->
           @php
                $usertype = '';
                $privilege = [];
            @endphp
           @if(Auth::guard('superadmin')->check())
                @php
                    $usertype = ['usertype'=>'super-admin'];
                @endphp
            @elseif(Auth::guard('admin')->check())
                @php
                    $usertype = ['usertype'=>'admin'];
                @endphp
            @elseif(Auth::guard('web')->check())
                @php
                    $usertype = ['usertype'=>'user'];
                    $privilege = ['edit_status'=>Auth::user()->editstatus,'delete_status'=>Auth::user()->deletestatus]
                @endphp
            @endif
            @php 
                array_push($privilege,$usertype);
            @endphp
        <bookmarkers_good_table_component :privilege="{{ json_encode($privilege) }}":allowed="{{ json_encode($allowed) }}"></bookmarkers_good_table_component>

 
        </div>
        <upload-bookmarker-component/>
    </div>
    <!-- ./main content card -->     
     
    <add-bookmarker-component/>
 
</div>

                             
                            </div>
                        </div>
                    
                    </div>
				 
				 
				 
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
        </div></div>

@endsection
