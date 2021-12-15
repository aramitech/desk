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
                    <h4> Company</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bookmarkers Company</li>
                    </ol>
                </nav>
            </div>

            
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                  
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Registry
                    </a>



                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Registry List</h2>
        <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                    <th class="table-plus">#</th>
                        <th>REF</th>
                       
                        <th>class</th>
                        {{--  <th>Subject</th>
                        
                        <th>Number</th>   --}}
                        <th>File Name</th>
                        <th>Volume</th> 
                         <th>Action</th>
                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($registries as $bookmarker)
          
                    <tr>
                    <td>{{ $bookmarker->registry_id }}</td>
                        <td>{{ $bookmarker->allpref }}</td>
                        
                        <td>{{ $bookmarker->class }}</td>
                       {{-- <td>{{ $bookmarker->subject }}</td>
                        <td>{{ $bookmarker->serial_number }}</td>--}}
                        <td>{{ $bookmarker->file_name }}</td> 
                        <td>{{ $bookmarker->volume }}</td>
  
                     
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->registry_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->registry_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                <button class="btn btn-sm btn-danger" @click="deleteItem('registrydelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>

                         

                               
                               </div> 
                            </div>
                            </td> 
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-fileregistry-component :fileregistrydata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->registry_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-fileregistry-component :fileregistrydata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

        
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- ./main content card -->
    <add-registry-component/>

    </div>
    <!-- ./main content card -->
    <add-registry-component/>
</div>

@endsection
