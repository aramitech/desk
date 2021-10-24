@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->public_lottery_companies_status;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->public_lottery_companies_status;
                }
            
                @endphp

@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4> Company</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Lottery Company</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
             
                @if ( Auth::user()->lottery_name == 'Allowed' )
<a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addlotteryshop" type="button">
                        Add  Lottery 
                    </a>
                    @else   
                @endif

                    @if ( Auth::user()->lottery_name_view == 'Allowed' )

                    <a class="btn btn-primary" href="{{ route('indexlotterynumber') }}" role="button" type="button">
                        View  Lottery Game
                    </a>
                    @else   
                @endif

                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
        <div class="pb-20">
        <add-companyuser-component/>
        </div>

    <!-- ./main content card -->
    <add-lotteryshop-component/>

    </div>
    <!-- ./main content card -->
    <add-publiclottery-component/>
</div>
@endsection
