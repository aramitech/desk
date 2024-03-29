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


@extends('vuexy.layouts.master4')
@section('title')
    Admin
@endsection
@section('content')
<div id="app">
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <br><br><br>

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                 
				 
				 
				 
				 
				 
				 
				           <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                               		
                                @include('layouts.messages')
    @include('layouts.errors')
    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
<H2 >PUBLIC LOTTERY NUMBER LIST  </H2></a>

</li></ul>



        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
         

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addlotteryshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Lottery 
                    </a>
                    
               

                </div>
            </div>


            <div class="col-md-12 col-sm-12 table-responsive">
		<table id="example" class="table table-striped  table-bordered table-hover">
                <thead>
                <tr>
                        <th class="table-plus">#</th>
                      
                          <th>Company</th>
                          <th>Lisence No</th>
                        <th>Lottery Game</th> 
                        <th>Lottery Numbers</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>       <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($publiclotterylotterynumbers as $bookmarker)
                    <tr>
                        <td>{{ $bookmarker->publiclotterynumber_id }}</td>
                        <td>  @if($bookmarker->publicLotterycompany) 
                        {{  $bookmarker->publicLotterycompany->company_name }}
                        @endif
                        </td>
                        <td>{{ $bookmarker->license_no }}</td>
                        <td>{{ $bookmarker->lottery_name }}</td>
                        <td>{{ $bookmarker->lottery_number }}</td>
                   
                        <td>{{ $bookmarker->periodfrom }}</td>
                        <td>{{ $bookmarker->periodto }}</td>
                        <td>{{ $bookmarker->status }}</td>
      
                      
                        <td class="not-exported">
													<div class="btn-group dropdown mr-1 mb-1">

                                                        <a href="#" role="button" style="" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="sr-only">Toggle Dropdown</span> </a>
                                                    
                                                             <div class="dropdown-menu">
               


<a class="dropdown-item text-success" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" role="button"><i class="fa fa-edit"></i>  View</a>
<a class="dropdown-item text-success" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" role="button"><i class="fa fa-edit"></i>  Edit</a>
<a class="dropdown-item text-danger" @click="deleteItem('publiclotterynumberdelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button></a>

                                                        </div>
													</div>
												</td>
                      
                 
                      
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


                    <div class="modal fade" id="uploadbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


        
                    @endforeach
                </tbody>
            </table>   <br><br><br><br><br><br><br>
        </div>
        <upload-bookmarker-company-component/>
    <!-- ./main content card -->
    </div>
    <add-lotteryshop-component/>

    
    </div>
    <!-- ./main content card -->
    <add-publiclottery-component/>
</div>

 
</div>

                             
                            </div>
                        </div>
                    
                    </div>
				 
				 
				 
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
        </div></div>

@endsection








