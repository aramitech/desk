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
                                            <br><br>    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addtask" type="button">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Task </i>
                    </a> <div>
           

               
                </div>
            </div>
                                             
                                                <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                <h4 class="media-heading">   
                                            Task
                                        
                                                </h4>





                 
                                                
                                                <table class="table table-striped dataex-html5-selectors">               <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Description</th>
                       
                        
                        <th>Status</th> 
                        <th>Reply Message</th>
                        <th>Reply </th>
                   
                    </tr>
                </thead>
                <tbody>
        
               
                @foreach($todoes as $key => $bookmarker )
                 <tr>
                 <th scope="row">{{ ++$key }}</th>
                        <td>{{ $bookmarker->description }}</td>

                        <td>{{ $bookmarker->status }}</td>
                        <td>{{ $bookmarker->replymessage }}</td>
                    
                        <td>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->task_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>

                    <a class="btn btn-danger btn-sm" href="{{ route('deletetask', $bookmarker->task_id ) }}"  data-target="#smstext-{{ $bookmarker->task_id }}"><i class="fa fa-trash"></i>Delete</a>   
</td>
                    </tr>

                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->task_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <confirm-task-component :taskdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


                                 @endforeach
                </tbody>
 
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
                <div class="modal" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Add
            </div>
            </div> </div> </div>
     
      <!-- ./main content card -->
      <add-task-component/>
</div>
</div>
</div>
</div>
@endsection

