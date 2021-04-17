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
                    <h4>Public Gaming</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Gaming</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addpublicgaming" type="button">
                        Add Public Gaming
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
    <h2 class="h4 pd-20">Public Gaming List</h2>
        <div class="pb-20">
           
             <!-- check user type logged in -->
             @php
                $usertype = '';
            @endphp
           @if(Auth::guard('superadmin')->check())
                @php
                    $usertype = 'super-admin';
                @endphp
            @elseif(Auth::guard('admin')->check())
                @php
                    $usertype = 'admin';
                @endphp
            @elseif(Auth::guard('web')->check())
                @php
                    $usertype = 'user';
                @endphp
            @endif
        <publicgaming_good_table_component :usertype="{{ $usertype }}"></publicgaming_good_table_component>



        </div>
    </div>
    <!-- ./main content card -->
    <add-publicgaming-component/>
</div>
@endsection

           
       