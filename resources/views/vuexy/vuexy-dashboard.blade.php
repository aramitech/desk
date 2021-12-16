@extends('vuexy.layouts.master2')
@section('title')
    Admin
@endsection
@section('content')

<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class=" bg-rgba-white card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">
 
 
                                     <h2> <p class="btn btn-primary">{{ $total_ggr_bookmarkers }}</p></h2>
                                  
                                    </h2>
                                    <p class="mb-0">Bookmarkers Total GGR</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        




                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="bg-rgba-white card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">
 
 
                                     <h2> <p class="btn btn-info">{{ $total_ggr_publiclotteries }}</p></h2>
                                  
                                    </h2>
                                    <p class="mb-0">Total Public Lottery GGR</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-2"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="bg-rgba-white card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-home text-danger font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="btn btn-danger mt-1">{{ round($total_ggr_publicgamings, 2) }}</h2>
                                    <p class="mb-0">Total Public Gaming GGR</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-3"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="bg-rgba-white card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title text-primary">BookMarkers</h4>
                                    <div class="dropdown chart-dropdown">
                                        <i class="fa fa-filter text-success"></i>
                                        <button class="btn bg-rgba-white btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem1">
                                            <a class="dropdown-item" href="?">Last 7 Days</a>
                                            <a class="dropdown-item" href="?date">Last 21 Days</a>
                                            <a class="dropdown-item" href="?month">Last Month</a>
                                            <a class="dropdown-item" href="?year">Last Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <!-- <div class="d-flex justify-content-start">
                                            <div class="mr-2">
                                                <p class="mb-50 text-bold-600">This Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span class="text-success">86,589</span>
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="mb-50 text-bold-600">Last Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span>73,683</span>
                                                </h2>
                                            </div>

                                        </div> -->
                                        <div class="height-300">
                                            <canvas id="bar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="bg-rgba-white card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0 text-secondary">Company Statuses</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chart" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50 text-success">Active</p>
                                                <p class="font-large-1 text-bold-700 text-success"> {{ $companyactive }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50 text-danger">Not Active</p>
                                                <p class="font-large-1 text-bold-700 text-danger">{{ $companyinactive }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="bg-rgba-white card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0 text-info">Lottery Numbers</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-count-chart" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50 text-success">Active </p>
                                                <p class="font-large-1 text-bold-700 text-success"> {{ $risk_closed }}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50 text-danger">Inactive</p>
                                                <p class="font-large-1 text-bold-700 text-danger">{{ $risk_reopened }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   

                      


                        <div class="col-md-6 col-12">
                              <div class="card">
                                <div class="bg-rgba-white card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title text-primary">Company Categories</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div id="customer-chart"></div>
                                       
                                    
                                    </div>
                                    <ul class="list-group list-group-flush customer-info">
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-primary"></i>
                                                <span class="text-bold-600">{{ $categories['category']['0'] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $categories['companycount'][0] }}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                                <span class="text-bold-600">{{ $categories['category'][1] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $categories['companycount'][1] }}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                                <span class="text-bold-600">{{ $categories['category'][2] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $categories['companycount'][2] }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                 
				 
				 
				 
			<!-- //////////////////////////////////////	 
			//////////////////////////////////////	 
			/////////////////////////////////////////	  -->
				 
            <!-- <div class="row">
            <div class="col-md-6 col-12">
                              <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Shop Categories</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-0">
                                        <div id="radar-chart"></div>
                                       
                                    
                                    </div>
                                    <ul class="list-group list-group-flush customer-info">
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-primary"></i>
                                                <span class="text-bold-600">{{ $bookmarkersshop['shop_name']['0'] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $bookmarkersshop['shop_name'][0] }}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                                <span class="text-bold-600">{{ $categories['category'][1] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $categories['companycount'][1] }}</span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between ">
                                            <div class="series-info">
                                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                                <span class="text-bold-600">{{ $categories['category'][2] }}</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $categories['companycount'][2] }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div> -->
                   
			 
				 
			<!-- /////////////////////////////////////////	 
			/////////////////////////////////////////	 
			///////////////////////////////////////	  -->
				 
				 
                    <div class="row">
                        <div class="col-md-6 col-12">
                            
                            <div class="card">
                                <div class="bg-rgba-info card-header">
                                    <h2 class="card-title"><i class="fa fa-history"></i> Most Recent Activities Logs </h2>
                                </div>
								
								<div class="table-responsive">
                                <table id="" class="table table-striped table-bordered" style="width:100%">   
                                <thead>  
                                    <tr>
                                        <th style="font-size:12px!important">Name</th>
                                        <th style="font-size:12px!important">Audit Activity</th>
                                        <th style="font-size:12px!important">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activitylogs as $auditLog)
                                        <tr style="font-size:12px">
                                            <td > @if($auditLog->userlogs) 
                                            {{  $auditLog->userlogs->name }}
                                            @endif
                                            
                                            </td>
                                            <td>{{ $auditLog->audit_activity }}</td>
                                            <td>{{ $auditLog->created_at->format('d M Y') }}</td>
                                    
                                        </tr>

                                        @endforeach
                                    </tbody>
                        
                                </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                              <div class="card">
                                <div class="bg-rgba-success card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title"><i class="fa fa-history"></i> Most Recent Audit Logs </h4>
                                </div>
                                <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered" style="width:100%">             
                                    <thead>
                                        <tr>                                       
                                
                                            <th style="font-size:12px!important">Name</th>
                                            <th style="font-size:12px!important">Email </th>
                                            <th style="font-size:12px!important">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

              
                                    @foreach($auditLogs as $auditLog)
                                        <tr  style="font-size:12px!important">
                                            <td>{{ $auditLog->name }}</td>
                                        
                                            <td>{{ $auditLog->email }}</td>
                                            <td>{{ $auditLog->created_at->format('d M Y') }}</td>
                                    
                                        </tr>

                                        @endforeach
                                    </tbody>
                        
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
				 
				 
				 
				 
				 
				 
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

@endsection
