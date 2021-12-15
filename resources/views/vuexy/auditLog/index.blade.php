@php 
    if(Auth::guard('admin')->check()) 
    { 
        $allowed = Auth::guard('admin')->user()->bookmarkers_companies_status; 
    } 
    elseif(Auth::guard('web')->check()) 
    { 
        $allowed = Auth::guard('web')->user()->bookmarkers_companies_status; 
    }
@endphp 
@extends('vuexy.layouts.master4') 
@section('title') Admin @endsection 
@section('content')
<div id="app">
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row"> </div>
			<br>
			<br>
			<br>
			<div class="content-body">
				<!-- Dashboard Ecommerce Starts -->
				<section id="dashboard-ecommerce">
					<div class="row">
						<div class="col-md-12 col-12">
							<div class="card"> @include('layouts.messages') @include('layouts.errors')
								<ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
<H2 >ACTIVITY LOGS </H2></a>

</li></ul>

								<div  class="card-content" class="pb-20">
							
                                    <div class="col-md-12 col-sm-12 table-responsive">
									<table id="example" class="table table-striped  table-bordered table-hover">
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
                        <td > @if($auditLog->userlogs) 
                        {{  $auditLog->userlogs->name }}
                        @endif
                        
                        </td>
                        <td>{{ $auditLog->audit_activity }}</td>
                        <td>{{ $auditLog->created_at }}</td>
                   
                    </tr>
                    <div class="modal fade" id="editauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-auditLog-component :auditLogdata="{{ json_encode($auditLog)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="assignroleauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
							</div>
						<!-- ./main content card -->
			</div>
		</div>
	</div>
</div>
</section>
<!-- Dashboard Ecommerce ends -->
</div>
</div>
</div>
</div> 
@endsection