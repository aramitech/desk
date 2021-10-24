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
                                <div class="card-header bg-warning">BOOKMARKERS COMPANY LIST  </div>
								<div  class="card-content" class="pb-20">
									<div class="col-md-12 col-sm-12 text-right">
										<div style="margin:5px">
											<a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button"> <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Record </i> </a>
											<a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#uploadbookmarkerscompany" type="button"> <i class="icon-copy fa fa-upload" aria-hidden="true">   Upload Record  </i> </a> <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button">
                                                Add  Shop
                                            </a> <a class="btn btn-warning" href="{{ route('shopindex') }}" role="button" type="button">
                                            View All Shop
                                            </a> 
                                        </div>
									</div>
                                    <div class="col-md-12 col-sm-12 table-responsive">
									<table id="example" class="table table-striped  table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Category</th>
												<th>Company Name</th>
												<th>Trading Name</th>
												<th>License No</th>
												<th>Address</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody> @foreach($bookmarkers as $bookmarker)
											<tr>
												<td>{{ $bookmarker->company_id }}</td>
												<td>{{ $bookmarker->CompanyCategoryType->categorytype }}</td>
												<td>{{ $bookmarker->company_name }}</td>
												<td>{{ $bookmarker->trading_name }}</td>
												<td>{{ $bookmarker->license_no }}</td>
												<td>{{ $bookmarker->physicaladdress }}</td>
												<td>{{ $bookmarker->status }}</td>
												<td>
													<div class="btn-group dropdown mr-1 mb-1">
                                                        <a href="#" role="button" style="paddingTop:2px;paddingBottom:2px;font-size:12px" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="sr-only">Toggle Dropdown</span> </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" role="button"><i class="fa fa-eye"></i> View</a>
                                                            <a class="dropdown-item text-info" href="#" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" role="button"><i class="fa fa-edit"></i> Edit</a> 
                                                            <a class="dropdown-item text-success" href="{{ route('shop_numbers', $bookmarker->company_id ) }}" data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-eye"></i>View Shops</a>
                                                            <a class="dropdown-item text-danger" href="{{ route('records_delete_company', $bookmarker->company_id ) }}" data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-trash"></i>Delete</a> 
                                                        </div>
													</div>
												</td>
											</tr>
											<div class="modal fade" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}" /> </div>
											</div>
											<div class="modal fade" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}" /> </div>
											</div>
											<div class="modal fade" id="uploadbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered">
													<view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}" /> </div>
											</div> @endforeach </tbody>
									</table>
                                    </div>
								</div>
								<upload-bookmarker-company-component/>
								<!-- ./main content card -->
							</div>
							<add-shop-component/> </div>
						<!-- ./main content card -->
						<add-bookmarkerscompany-component/> </div>
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