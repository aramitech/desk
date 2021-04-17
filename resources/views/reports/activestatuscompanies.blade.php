@extends('layouts.master')
@section('title')
    Admin:COMPANY STATUS FORM
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
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									Actions
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<!-- <a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a> -->

									<div class="d-flex justify-content-end mb-4">
									<a class="dropdown-item" href="/activestatuscompanysrepo/pdf/ ">Export to PDF</a>
        </div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="invoice-wrap">
					<div class="invoice-box">
						<div class="invoice-header">
							<div class="logo text-center">
								<img src="vendors/images/deskapp-logo.png" alt="">
							</div>
						</div>
						<!-- <h4 class="text-center mb-30 weight-600">COMPANY LETTER HEAD</h4> -->
                        <h4 class="text-center mb-30 weight-600">COMPANY STATUS FORM</h4>
					
                        <div class="row pb-30">   
							<div class="col-md-6"> 

							</div>
							<div class="col-md-6">
								<div class="text-right">

									<p class="font-14 mb-5"></p>
								</div>
							</div>
						</div> 
						<div class="invoice-desc pb-30"> <table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                    <th class="table-plus">#</th>
                        <th>company_name</th>
                        <th>trading_name</th>
                        <th>license_no</th>
                        <th>Contact</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <    @foreach($activestatuscompanies as $activestatuscompany)
                    <tr>
                    <td>{{ $activestatuscompany->company_id }}</td>
                        <td>{{ $activestatuscompany->company_name }}</td>
                        <td>{{ $activestatuscompany->trading_name }}</td>
                        <td>{{ $activestatuscompany->license_no }}</td>
                        <td>{{ $activestatuscompany->contact }}</td>
                        <td>{{ $activestatuscompany->status }}</td>
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>


							<div class="invoice-desc-footer">
								<div class="invoice-desc-head clearfix">
									<!-- <div class="invoice-sub">ATTENDANT / CLERK....</div> -->
									<div class="invoice-rate"></div>
									<!-- <div class="invoice-sub">MANAGER/ SUPERVISOR.................</div> -->
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub">
												<p class="font-14 mb-5"> <strong class="weight-600"></strong></p>
												<p class="font-14 mb-5"> <strong class="weight-600"></strong></p>
											</div>
											<div class="invoice-rate font-20 weight-600"></div>
											<div class="invoice-subtotal"><span class="weight-600 font-24 text-danger"></span></div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<h4 class="text-center pb-20"></h4>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
			</div>
		</div>
@endsection

           
       