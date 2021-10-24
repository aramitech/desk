@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->assign_task;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->assign_task;
                }
            
                @endphp


@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4> Assign Registry</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Registry</li>
                    </ol>
                </nav>
            </div>

            
            <div class="col-md-6 col-sm-12 text-right">
                <div>
               
                <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">
                Records</a>



                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
     <div class="pb-20">
        <add-assignregistryuser-component/>
        </div>

    <!-- ./main content card -->
    <add-assign-registry-component/>

    </div>
    <!-- ./main content card -->

    
    <div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Assign Registry</h4>
    </div>
    <div class="modal-body">
 
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Folio</th>
                          <th>Issued To</th>
                        
                        <th>Duration Issued</th> 
                        <th>Reason You Issue</th>
                         <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($assignregistries as $bookmarker)
          
                    <tr>
                    <td>{{ $bookmarker->registry_id }}</td>
                    <td>@if($bookmarker->assignregistry_registry) 
                        {{  $bookmarker->assignregistry_registry->folio }}
                        @endif

                    </td>
                
                        <td>{{ $bookmarker->issued_to }}</td>
                        <td>{{ $bookmarker->duration_issued }}</td>
                        <td>{{ $bookmarker->reason_you_issue }}</td>
                      
                     
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                                @if ( Auth::user()->view_status == 'Allowed' )
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->registry_id}}" type="button"><i class="dw dw-edit2"></i> View</button>
                                    @else   
                                    @endif
                                    @if ( Auth::user()->editstatus == 'Allowed' )
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->registry_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>

                                    @else   
                                    @endif
                                    @if ( Auth::user()->deletestatus == 'Allowed' )

                                    <button class="btn btn-sm btn-danger" @click="deleteItem('fileregistryassigndelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>
                                    @else   
                                    @endif
                         

                               
                               </div> 
                            </div>
                            </td>  
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-fileregistry-component :fileregistrydata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-fileregistry-component :fileregistrydata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

        
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->






</div>

@endsection
