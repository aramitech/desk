@extends('vuexy.layouts.master')
@section('title')
FILING REPORT:
@endsection
@section('content')

<div id="app">
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

         <!-- invoice functionality start -->
         <section class="invoice-print mb-1">
               <table>        
                    <tr>
                    
                        <td width="500">
                        <div class="col-sm-12 col-12 text-left pt-1">
               <div class="card">
                    <div class="card-header">                                             
                        <h4 class="card-title">Send Mail</h4>
                        <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>                  
                    </div>
                    <div class="card-content collapse">
                    <form action="{{ route('send-mail-filing') }}" method="post">       
                    @csrf
                    <input type="text" name="subject" class="form-control" placeholder="Subject" aria-describedby="button-addon2">

<input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                            <div class="input-group-append" id="button-addon2">
                                <button type="submit" class="btn btn-primary btn-lg">Send Mail</button>
                            </form>
                    </div>
                    </div>  </div>   </div>    

                        </td>
                        <td width="500">   <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                        <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                      <a href="{{route('filingpdf')}}" class="btn btn-success"><i class="feather icon-download"></i> Download </a> 
                              <a href="{{route('exportExcelfiling')}}" class="btn btn-warning"> <i class="feather icon-excel"></i> Export to Excel </a> 

                    
                    </div></div>  </div>  </td>
                        
                
                    </tr>
                   </table>

    </section>
                <!-- invoice functionality end -->
       <!-- users filter start -->






   

                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                          
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                  
                                        <!-- users edit media object ends -->                           
                                        <!-- users edit account form start -->
 
                   
                                    <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                        <!-- users edit socail form start -->
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                <div class="col-md-12 col-sm-12 text-right">
                <div>
           

               
                </div>
            </div>
                                           
                                                <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                 

                  <!-- users filter start -->
                  <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse">
                            <div class="card-body">
                                <div class="users-list-filter">
                                    <form>
                                        <div class="row">
                                     
                                        <form>

                                        <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-status">File Name</label>
                                                <fieldset class="form-group">
                                                <input class="form-control"  name="file_name" value="" type="text" placeholder="" >
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-status">Volume</label>
                                                <fieldset class="form-group">
                                                <input class="form-control"  name="volume" value="" type="text" placeholder="" >
                                            </div>



<div class="col-12 col-sm-6 col-lg-3">
<button type="submit" class="btn btn-primary">Search</button>

</div>
</form>
                  
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users filter end -->

      
                    
                    <div id="invoice-company-details" class="row">
                        
                            <div class="col-sm-6 col-12 text-left pt-1">
                             
                            </div>
                            <div class="col-sm-12 col-12 text-center">
                            {{-- <!-- <div class="media pt-1" >
                         <img src="../../../desk/public/tyu/app-assets/images/logo/logo.png" class="center" alt="company logo" width="133" height="133" />
                                </div> -->--}}
                            
                                <div class="invoice-details mt-2">
                                    <h3>OFFICE OF THE PRESIDENT</h3>
                                    <h3> MINISTRY OF INTERIOR AND</h3>
                                    <h3>  CO-ORDINATION OF NATIONAL GOVERNMENT</h3>
                                    <h3> BETTING CONTROL AND LICENSING BOARD</h3>
                                    <h4>  Kenya Charity Sweepstake House, 3rd & 8th floor, Mama Ngina Street</h4>
                                    <h1>FILING REPORT</h1>
  
                                </div>
                            </div>
                        </div>

                        @include('layouts.messages')
    @include('layouts.errors') 
                           
                                                
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>REF</th>   <th>Folio</th>
                          <th>Subject Heading</th>
                        
                        <th>Registry Date</th> 
                        <th>status</th>
               
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($filings as $bookmarker)
          
                    <tr>
                        <td>{{ $bookmarker->file_registry_id }}</td>
                        <td>{{ $bookmarker->file_registry_ref }}</td>
                        <td>{{ $bookmarker->folio }}</td>
                        <td>{{ $bookmarker->subject_heading }}</td>
                        <td>{{ $bookmarker->registry_date }}</td>
                        <td>{{ $bookmarker->status }}</td>

                        
                     
                   
                    </tr>
                 
        
                    @endforeach
                </tbody>
            </table>
            @if(Auth::guard('web')->check())
<u>{{ Auth::guard('web')->user()->name }}</u>
	
@elseif(Auth::guard('admin')->check())
<u>{{ Auth::guard('admin')->user()->name }}</u>
							@endif  




                                            </div>  </div></div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <!-- <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        Changes</button> -->
                                                    <!-- <button type="reset" class="btn btn-outline-warning">Reset</button> -->
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit socail form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
                <div class="modal" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Add
            </div>
            </div> </div> </div>
     
      <!-- ./main content card -->
      <add-bookmarkerscompany-component/>
</div>
</div>
</div>
</div>

@endsection
