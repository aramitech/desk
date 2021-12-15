@extends('layouts.master')
@section('title')
    User
@endsection
@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>BookMarkers</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BookMarkers</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addbookmarkers" type="button" data-backdrop="static" data-keyboard="false">
                        Add BookMarkers
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
    <h2 class="h4 pd-20">BookMarkers List</h2>
        <div class="pb-20">
           
        <table class="table table stripe hover nowrap  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>License No</th>
            
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Bets No</th>
                        <th>Total Sales </th>
                        <th>GGR </th>
                     <th>Action</th>
                        <th class="datatable-nosort"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookmarkers as $bookmarker)
                    <tr>
                        <td>{{ $bookmarker->bookmarker_id }}</td>
                        <td>{{ $bookmarker->license_no }}</td>
              
                        <td>{{ $bookmarker->branch }}</td>
                        <td>{{ $bookmarker->date }}</td>
                        <td>{{ $bookmarker->bets_no }}</td>
                        <td>{{ $bookmarker->total_sales }}</td>
                        <td>{{ $bookmarker->ggr }}</td>
                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewbookmarker{{$bookmarker->bookmarker_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                  
                                    
                                    @if ( Auth::user()->editstatus == 'Allowed' )
                                     <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarker{{$bookmarker->bookmarker_id}}" type="button" data-backdrop="static" data-keyboard="false"><i class="dw dw-edit2"></i> Edit</button>
                                     @else   
                                    @endif
                                    @if ( Auth::user()->deletestatus == 'Allowed' )
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('bookmarkerdelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>
                                    @else   
                                    @endif
                            
                           <!-- </div> -->
                            </div>
                            </td>  <td></td>    
                    </tr>
                    <div class="modal fade" id="editbookmarker{{$bookmarker->bookmarker_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarker{{$bookmarker->bookmarker_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
     
    <add-bookmarker-component/>
 
</div>
@endsection

           
       