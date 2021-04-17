@extends('layouts.master')
@section('title')
    User
@endsection
@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>BookMarkers</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BookMarkers</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addbookmarkers" type="button">
                        Add BookMarkers
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">BookMarkers List</h2>
        <div class="pb-20">
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
        <bookmarkers_good_table_component :privilege="{{ json_encode($privilege) }}"></bookmarkers_good_table_component>


        </div>
    </div>
    <!-- ./main content card -->
     
    <add-bookmarker-component/>
 
</div>
@endsection

           
       