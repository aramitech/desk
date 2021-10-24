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
<H2 >SEND SMS </H2></a>

</li></ul>

        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addsms" type="button">
                         Send SMS To Company
                    </a>

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#sendsmstocategory" type="button">
                         Send SMS To Category
                    </a>

                </div>
            </div>


        <div class="pb-20">
                     <!-- check user type logged in -->
                     <table class="table zero-configuration">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Sms </th>
            
                        <th>Sms No</th>
                        <th>Date</th>
                    
         
                    
                
                    </tr>
                </thead>
                <tbody>
                @foreach($sendsmsis as $bookmarker)
               {{-- @if ( Auth::user()->records_send_sms == 'Allowed' ) --}}

                    <tr>
                        <td>{{ $bookmarker->sendsms_id }}</td>
                        <td>{{ $bookmarker->message }}</td>
              
                        <td>{{ $bookmarker->company_id }}</td>
                        <td>{{ $bookmarker->created_at }}</td>

                          
                    </tr>
                    <div class="modal fade" id="editbookmarker{{$bookmarker->sendsms_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarker{{$bookmarker->sendsms_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                 {{--   @else   
                @endif--}}
                    @endforeach
                </tbody>
            </table>
        </div>
        <add-sendsmscompanycategory-component/>

    </div>
    <!-- ./main content card -->
     
    <add-sendsms-component/>
 
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





