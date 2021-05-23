@extends('vuexy.layouts.master')
@section('title')
Category Types List:
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
                <button class="btn btn-primary" data-toggle="modal" id="show-modal" data-target="#addcompany" type="button" >
                        Add  Company
                    </button>

               
                </div>
            </div>
                                                <h4 class="media-heading">   
                                                Company:
                                        
                                                </h4>
                                                <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                 
                                                
                                                <table class="table table-striped dataex-html5-selectors">               <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Category</th>
                          <th>Company Name</th>
                        
                        <th>Trading Name</th> 
                        <th>License No</th>
                    
                        <th>Address</th>
                        <th>Status</th>       <th>Action</th>
                   
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
                        <button class="btn btn-sm btn-info"  id="show-modal" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="feather icon-view"></i> </button>
<button class="btn btn-sm btn-info" data-toggle="modal"  id="show-modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="feather icon-edit"></i></button>
<button class="btn btn-sm btn-danger" @click="deleteItem('bookmarkerscompanydelete',{{$bookmarker}})"><i class="feather icon-trash"></i> </button>
                      
                            </td>  
                    </tr>
                    <div class="modal" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


                    @endforeach
                </tbody>
            </table>




                                            </div>  </div></div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <!-- <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        Changes</button> -->


                                                        <div class="modal" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


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

