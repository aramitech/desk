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
<H2 >PUBLIC LOTTERY COMPANY LIST  </H2></a>

</li></ul>



        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Record </i>
                    </a>

                    <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#uploadbookmarkerscompany" type="button">
                    <i class="icon-copy fa fa-upload" aria-hidden="true">Upload Record</i>   
                    </a>

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addlotteryshop" type="button">
                        Add  Lottery 
                    </a>
                    
                    <a class="btn btn-warning" href="{{ route('indexlotterynumberadmins') }}" role="button" type="button">
                        View  Lottery Game
                    </a>


                </div>
            </div>


            <table id="example" class="table table-striped table-bordered" style="width:100%">
            
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Category</th>
                          <th>Company Name</th>
                        
                        <th>Trading Name</th> 
                        <th>License No</th>
                    
                        <th>Address</th>
                        <th>Status</th>       <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookmarkers as $bookmarker)

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
                    <button type="button" class="btn btn-primary"></button>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
{{--  <button class="btn btn-sm btn-danger" @click="deleteItem('bookmarkerscompanydelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>--}}



<a class="btn btn-primary btn-sm" href="{{ route('shop_numbers', $bookmarker->company_id ) }}"  data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-plus"></i>View Shops</a>

<a class="btn btn-danger btn-sm" href="{{ route('records_delete_company', $bookmarker->company_id ) }}"  data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-plus"></i>Delete</a>



</div></div>
                     
                            </div>
                       
                           
                             
                              
                        
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


                    <div class="modal fade" id="uploadbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


        
                    @endforeach
                </tbody>
            </table>
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
