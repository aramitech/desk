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
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>

									<div class="d-flex justify-content-end mb-4">
									<a class="btn btn-primary" href="{{ URL::to('/bookmarkersrepo/pdf') }}">Export to PDF</a>
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
						<h4 class="text-center mb-30 weight-600">COMPANY LETTER HEAD</h4>
                        <h4 class="text-center mb-30 weight-600">BOOKMARKERS RETURN FORM</h4>
						@foreach($bcompanies as $bcompany)
                        <div class="row pb-30">   
							<div class="col-md-6"> 
								<h5 class="mb-15">NAME OF LICENSEE: {{ $bcompany->company_name}}</h5>
								<p class="font-14 mb-5">LICENSEE NO: <strong class="weight-600">{{ $bcompany->license_no}}</strong></p>
								<p class="font-14 mb-5">RETURN FOR THE PERIOD OF: <strong class="weight-600">....</strong></p>
							</div>
							<div class="col-md-6">
								<div class="text-right">
									<p class="font-14 mb-5">BRANCH :  {{ $bcompany->branch}} </strong></p>
									<p class="font-14 mb-5">DATE :  {{ date('Y-m-d H:i:s') }}</p>
									<p class="font-14 mb-5">TO</p>
									<p class="font-14 mb-5"></p>
								</div>
							</div>
						</div> 
						<div class="invoice-desc pb-30">
					
							<table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Date</th>
                        <th>No. of Bets</th>
                        <th>Deposits</th>
                        <th>Total Sales</th>
                        <th>TOTAL Payouts</th>
                        <th>WHT</th>
                        <th>GGR</th> 
                    </tr>
                </thead>
                <tbody>
				@php $sum=0;
				@endphp
				 @foreach($bookmarkers as $bookmarker)
				 @php $sum +=$bookmarker->bets_no ;
				@endphp
				    <tr>
                        <td>{{ $bookmarker->bookmarker_id }}</td>
                        <td>{{ $bookmarker->date }}</td>
                        <td>{{ $bookmarker->bets_no }}</td>
                        <td>{{ $bookmarker->deposits }}</td>
                        <td>{{ $bookmarker->total_sales }}</td>
                        <td>{{ $bookmarker->total_payout }}</td>
                        <td>{{ $bookmarker->wht }}</td>
                        <td>{{ $bookmarker->ggr }}</td>                      
                 <td></td>    
                    </tr>
                    <div class="modal fade" id="editbookmarker{{$bookmarker->bookmarker_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                    @endforeach   
                </tbody> <tbody>
			<th>Total</th>
			<td></td> <td colspan="2">{{ $sum }}</td></tbody>
            </table>        @endforeach 
							<div class="invoice-desc-footer">
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">ATTENDANT / CLERK....</div>
									<div class="invoice-rate"></div>
									<div class="invoice-sub">MANAGER/ SUPERVISOR.................</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub">
												<p class="font-14 mb-5">Account No: <strong class="weight-600">123 456 789</strong></p>
												<p class="font-14 mb-5">Code: <strong class="weight-600">4556</strong></p>
											</div>
											<div class="invoice-rate font-20 weight-600"></div>
											<div class="invoice-subtotal"><span class="weight-600 font-24 text-danger"></span></div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<h4 class="text-center pb-20">!!</h4>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
			</div>
		</div>
@endsection

           
       