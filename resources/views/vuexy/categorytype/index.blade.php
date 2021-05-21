@extends('vuexy.layouts.master')
@section('title')
Category Types List:
@endsection
@section('content')

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
                                                <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcategorytype" type="button">
                        Add Category Type
                    </a>

                    <button type="button" class="btn btn-outline-primary block btn-lg" data-toggle="modal" data-target="#default">
                                                    Launch Modal
                                                </button>
                </div>
            </div>
                                                <h4 class="media-heading">   
                                                Category Types List:
                                        
                                                </h4>
                                                <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                <table class="table table-striped dataex-html5-selectors">                                                <thead>
                                                    <tr>
                                                    <th class="table-plus">#</th>
                        <th>Category Name</th>
               
                       
              
                                               
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categorytypes as $categorytype)
                    <tr>
                    <td>{{ $categorytype->categorytypes_id }}</td>
                    <td>{{ $categorytype->categorytype }}</td>
                 
                    </tr>
             
                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th class="table-plus">#</th>
                        <th>Category Name</th>
               
                       
            
                                                   
                                                    </tr>
                                                </tfoot>
                                            </table>

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
                <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
            </div>
        </div>
     
    <add-categorytype-component/>
    </div> </div> </div> </div>


@endsection
