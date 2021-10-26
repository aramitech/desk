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
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Record </i>
                    </a>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Shop
                    </a>

                    <a class="btn btn-primary" href="{{ route('shop') }}" role="button" type="button">
                        View All Shop
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
    <h2 class="h4 pd-20">Bookmarkers Company List</h2>
        <div class="pb-20">
       
        </div>

    <!-- ./main content card -->
    <add-shop-component/>

    </div>
    <!-- ./main content card -->
    <add-bookmarkerscompany-component/>
</div>

@endsection
