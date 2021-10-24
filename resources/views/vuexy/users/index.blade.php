@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->records_bookmarkers;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->records_bookmarkers;
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
<H2 >DEPARTMENTS USERS LIST  </H2></a>

</li></ul>



        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                  {{--  <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#adminuser" type="button">
                        Add Admin User
                    </a>--}}
                </div>
            </div>


            <table class="table zero-configuration">
            <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th> Name</th>
                        <th>Email</th>
                    
                        <th>Date</th> 
            
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $adminuser)
                    <tr>
                        <td>{{ $adminuser->id }}</td>
                        <td>{{ $adminuser->name }}</td>
                        <td>{{ $adminuser->email }}</td>
                        <td>{{ $adminuser->created_at->format("y-M-d") }}</td>
   
                        <td>

                        <div class="btn-group dropdown mr-1 mb-1">
                    <button type="button" class="btn btn-primary"></button>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edituser{{$adminuser->id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                 
                                    @if ( Auth::user()->id == $adminuser->id )
  
                                    @else 
                                    <a href="{{ route('admins_user',$adminuser->id)}}"> <button class="btn btn-primary btn-sm" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit">Role</i> </button></a>

                                    
                                    @endif
</div></div>
                     
                            </div>


</td>
                    </tr>
                    <div class="modal fade" id="edituser{{$adminuser->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <edit-user-component :userdata="{{ json_encode($adminuser)}}"/>

                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-adminuser-component/>
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
