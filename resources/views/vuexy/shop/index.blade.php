@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->bookmarkers_companies_status;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->bookmarkers_companies_status;
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
<H2 >BOOKMARKERS SHOP LIST  </H2></a>

</li></ul>



        <div class="pb-20">

        <div class="col-md-12 col-sm-12 text-right">
                <div>
                

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Shop
                    </a>

                 


                </div>
            </div>


            <table id="example" class="table table-striped table-bordered" style="width:100%">

                <thead>
                <tr>
                        <th class="table-plus">#</th>
                        <th>Company</th>
                        
                        <th>Shop Name</th>  
                         <th>Location</th>  
                         <th>Shop Number</th>   
                      <th>Action</th>
             
                    </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->shop_id }}</td>
                        <td> @if($shop->Shopcompany) 
                        {{  $shop->Shopcompany->company_name }}
                        @endif</td>
                        <td>{{ $shop->shop_name }}</td>    
                        <td>{{ $shop->location }}</td> 
                        <td>{{ $shop->shop_number }}</td>              
                        <td class="not-exported">
													<div class="btn-group dropdown mr-1 mb-1">
                                                        <a href="#" role="button" style="" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="sr-only">Toggle Dropdown</span> </a>
                                                        <div class="dropdown-menu">
               

<a class="dropdown-item text-primary" data-toggle="modal" data-target="#viewshopcompany{{$shop->shop_id}}" role="button"><i class="fa fa-eye"></i>  View</a>
<a class="dropdown-item text-success" data-toggle="modal" data-target="#editshopcompany{{$shop->shop_id}}" role="button"><i class="fa fa-edit"></i>  Edit</a>
<a class="dropdown-item text-danger" href="{{ route('shopo.delete', $shop->shop_id) }}"  data-target="#smstext-{{ $shop->shop_id }}"><i class="fa fa-trash"></i> Delete</a>

                                                       </div>
													</div>
												</td>
         
                    </tr>
                    <div class="modal fade" id="editshopcompany{{$shop->shop_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-shop-component :shopdata="{{ json_encode($shop)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewshopcompany{{$shop->shop_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-shop-component :shopdata="{{ json_encode($shop)}}"/>
                        </div>
                    </div>
                  

        
                    @endforeach
                </tbody>
            </table>  <br><br><br><br><br><br><br>
        </div>
        <upload-bookmarker-company-component/>
    <!-- ./main content card -->
    </div>
    <add-shop-component/>

    
    </div>
    <!-- ./main content card -->
    <add-bookmarkerscompany-component/>
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
