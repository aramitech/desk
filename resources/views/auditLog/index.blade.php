@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('filter')
<form>
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
	<!-- <div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
		<div class="col-sm-12 col-md-10">
			<input class="form-control form-control-sm form-control-line" type="text">
		</div>
	</div> -->
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
                    <h4>auditLogs</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">auditLogs</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addauditLog" type="button">
                        Add auditLog
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">auditLogs List</h2>
        <div class="pb-20">
            <table class="table table stripe hover nowrap data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>audit Module</th>
                        <th>Name</th>
                        <th>Audit Activity</th>
                        <th>Date</th>
          
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $auditLog)
                    <tr>
                        <td>{{ $auditLog->audit_log_id }}</td>
                        <td>{{ $auditLog->audit_module }}</td>
                        <td>{{ $auditLog->userlogs->name }}</td>
                        <td>{{ $auditLog->audit_activity }}</td>
                        <td>{{ $auditLog->created_at }}</td>
                   
                    </tr>
                    <div class="modal fade" id="editauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-auditLog-component :auditLogdata="{{ json_encode($auditLog)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="assignroleauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <assignrole-auditLog-component :auditLogdata="{{ json_encode($auditLog)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-auditLog-component/>
</div>
@endsection
