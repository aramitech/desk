@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->assign_task;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->assign_task;
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
<H2 >TASKING  </H2></a>

</li></ul>

        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button">
                       Capture Task
                    </a>
                 
                </div>
            </div>


        <div class="pb-20">
                     <!-- check user type logged in -->
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

            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Folio</th>
                          <th>Issued To</th>
                        
                        <th>Duration Issued</th> 
                        <th>Reason You Issue</th>
                         <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignregistries as $bookmarker)
          
                    <tr>
                    <td>{{ $bookmarker->registry_id }}</td>
                    <td>@if($bookmarker->assignregistry_registry) 
                        {{  $bookmarker->assignregistry_registry->folio }}
                        @endif

                    </td>
                
                        <td>{{ $bookmarker->issued_to }}</td>
                        <td>{{ $bookmarker->duration_issued }}</td>
                        <td>{{ $bookmarker->reason_you_issue }}</td>
                      
                        <td class="not-exported">
													<div class="btn-group dropdown mr-1 mb-1">
													{{-- <a href="#" role="button" style="paddingTop:2px;paddingBottom:4px;font-size:12px" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="sr-only">Toggle Dropdown</span> </a> --}}

                                                        <a href="#" role="button" style="" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="sr-only">Toggle Dropdown</span> </a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->file_registry_id}}" role="button"><i class="fa fa-eye"></i> View</a>
                                                            <a class="dropdown-item text-info" href="#" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->file_registry_id}}" role="button"><i class="fa fa-edit"></i> Edit</a> 
                                                            <a class="dropdown-item text-danger" @click="deleteItem('fileregistrydelete',{{$bookmarker}})"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
													</div>
												</td>
                        


              
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

        
                    @endforeach
                </tbody>
            </table>
        </div>
    <!-- ./main content card -->
    <add-assign-registry-component/>

    </div>
    <!-- ./main content card -->
    <add-registry-component/>
    
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


