@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->publiclotterystatus;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->publiclotterystatus;
                }
            
                @endphp

@extends('layouts.master')
@section('title')
    User
@endsection

@section('filter')
<form method="GET" action="{{ route('bookmarkers.inactivebookmarkers') }}">
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">From</label>
		<div class="col-sm-12 col-md-10">
			<input name="from" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">To</label>
		<div class="col-sm-12 col-md-10">
			<input name="to" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Not Recorded</label>
		<div class="col-sm-12 col-md-10">
			<input name="inactive" class="form-control form-control-sm form-control-line" type="checkbox">
		</div>
	</div>
	<div class="text-right">
		<button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>
@endsection

@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Public Lottery</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Lottery</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addpubliclottery" type="button">
                        Add Record
                    </a> -->
                    <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">
                Records</a>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#uploadpubliclottery" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-upload" aria-hidden="true">Upload Record</i>   
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
        <div class="pb-20">
                     <!-- check user type logged in -->
     
            <add-userpubliclotteryrecord-component/>
        </div>
        <upload-publiclottery-component/>
    </div>
    <!-- ./main content card -->
    

<div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Public Lottery</h4>
    </div>
    <div class="modal-body">
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
        <user_publiclottery_good_table_component :privilege="{{ json_encode($privilege) }}":allowed="{{ json_encode($allowed) }}"></user_publiclottery_good_table_component>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




</div>
@endsection

           
       