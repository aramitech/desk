@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->user_accounts_status;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->user_accounts_status;
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
<H2 >ACCOUNTS LIST </H2></a>

</li></ul>


        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addbookmarkers" type="button">
                        Add Record
                    </a>

    
                </div>
            </div>

            <!-- <game-component></game-component> -->
        <div class="pb-20">
                 <!-- check user type logged in -->
 
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company </th>
                          <th>MR No</th>
                        
                        <th>Application F</th> 
                        <th>Transfer F</th>
                    
                        <th>Annual License F</th>
                        <th>Status</th>    
                        <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
              
             
                    @if($allowed == 'Allowed')
                 
                    @foreach($accounts as $account)
                  
      

                    <tr>
                        <td>{{ $account->company_id }}</td>
                        <td> @if($account->accountscompany) 
                        {{  $account->accountscompany->company_name }}
                        @endif</td>
                        <td>{{ $account->mrno }}</td>
                        <td>{{ $account->application_fee }}</td>
                        <td>{{ $account->transfer_fee }}</td>
                   
                        <td>{{ $account->annual_license_fee }}</td>
                        <td>{{ $account->status }}</td>
                     
                        <td>

                        <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item edit_data" href="editbookmarkercompany{{$account->company_id}}"  data-target="#smstext-{{$account->company_id}}"><i class="fa fa-plus"></i>Edit</a>

				                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item edit_data" href="{{ route('accountsedit', $account->accounts_id ) }}"  data-target="#smstext-{{ $account->accounts_id }}"><i class="fa fa-plus"></i>Edit</a>
				                  </div>




                        <div class="btn-group dropdown mr-1 mb-1">
                    <button type="button" class="btn btn-primary"></button>
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">


                                          

                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewbookmarkercompany{{$account->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>
                              {{--<a class="btn btn-primary btn-sm" href="{{ route('accountsedit', $account->accounts_id ) }}"  data-target="#smstext-{{ $account->accounts_id }}"><i class="fa fa-plus"></i>Edit</a>--}}

                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editbookmarkercompany{{$account->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                {{--  <button class="btn btn-sm btn-danger" @click="deleteItem('accountscompanydelete',{{$account}})"><i class="dw dw-delete-3"></i> Delete</button>--}}
                                  <a class="btn btn-danger btn-sm" href="{{ route('records_delete', $account->accounts_id ) }}"  data-target="#smstext-{{ $account->accounts_id }}"><i class="fa fa-plus"></i>Delete</a>



</div></div>
                     
                            </div>


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
                    $user_types_id = ['user_types_id'=>Auth::user()->user_types_id]
                @endphp
            @endif
            @php 
                array_push($privilege,$usertype);  
            @endphp



                        
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$account->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-accounts-component :bookmarkerdata="{{ json_encode($account)}}" :user_types_id="{{ json_encode($account)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$account->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-accounts-component :bookmarkerdata="{{ json_encode($account)}}"/>
                        </div>
                    </div>

                    
                    @endforeach

                    @else
                    
                    @endif
                </tbody>
            </table>
        </div>
        <upload-publicgaming-component/>
    </div>
    <!-- ./main content card -->
    <add-accounts-component/>



 
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