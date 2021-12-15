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
<H2 >ALL USERS LIST  </H2></a>

</li></ul>



        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                  {{--  <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#adminuser" type="button">
                        Add Admin User
                    </a>--}}

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#adduser" type="button">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  User </i> 
                    </a>


                </div>
            </div>


            <table id="example" class="table table-striped table-bordered" style="width:100%">
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
   
                        <td class="not-exported">
													<div class="btn-group dropdown mr-1 mb-1">

                                                        <a href="#" role="button" style="" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="sr-only">Toggle Dropdown</span> </a>
                                                    
                                                             <div class="dropdown-menu">
               




<a class="dropdown-item text-success" data-toggle="modal" data-target="#edituser{{$adminuser->id}}"><i class="dw dw-edit2"></i> Edit</a>
<a class="dropdown-item text-success" href="{{ route('assignroleuser',$adminuser->id)}}"> <i class="fa fa-edit">Role</i> </a></a>
<a class="dropdown-item text-success" href="{{ route('userss.delete', $adminuser->id) }}"  data-target="#smstext-{{ $adminuser->id }}"><i class="fa fa-plus"></i>Delete</a>




                                                        </div>
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
            <br><br><br><br><br><br>
        </div>
    </div>
    <!-- ./main content card -->
    <add-user-component/>
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
