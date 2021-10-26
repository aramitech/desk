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

            
            <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Record </i>
                    </a>

                    <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#uploadbookmarkerscompany" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-upload" aria-hidden="true">   Upload Record  </i>
                    </a>


                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Shop
                    </a>

                    <a class="btn btn-warning" href="{{ route('shop') }}" role="button" type="button">
                       View All Shop
                     </a>


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
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                 {{--  <button class="btn btn-sm btn-danger" @click="deleteItem('bookmarkerscompanydelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>--}}

                     

                    <a class="btn btn-primary btn-sm" href="{{ route('shop_numbers', $bookmarker->company_id ) }}"  data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-plus"></i>View Shops</a>

                                  <a class="btn btn-danger btn-sm" href="{{ route('records_delete_company', $bookmarker->company_id ) }}"  data-target="#smstext-{{ $bookmarker->company_id }}"><i class="fa fa-plus"></i>Delete</a>

                               
                               </div> 
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
    <add-shop-component/>

    
    </div>
    <!-- ./main content card -->
    <add-bookmarkerscompany-component/>
</div>

@endsection
