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
                        <li class="breadcrumb-item active" aria-current="page">Bookmarkers Company</li>
                    </ol>
                </nav>
            </div>

            
            <div class="col-md-6 col-sm-12 text-right">
                <div>
            

 @if ( Auth::user()->bookmarkersshop_status == 'Allowed' )
                            

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button">
                        Add  Shop
                    </a>
                    @else   
                                    @endif
                                    @if ( Auth::user()->bookmarkers_view_shop_status == 'Allowed' )

                    <a class="btn btn-primary" href="{{ route('shop') }}" role="button" type="button">
                        View All Shop
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
           <!-- check user type logged in -->
          
           <add-bookmarkerscompanyuser-component> <add-bookmarkerscompanyuser-component/>
 
        </div>
        <add-shop-component/>
    </div>
    <!-- ./main content card -->     
     
    <add-bookmarker-component/>
 
</div>
@endsection

           
  