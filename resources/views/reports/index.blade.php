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
                        <li class="breadcrumb-item active" aria-current="page"> Company</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
            <a href="{{route('AllBookMarkertotals', $bookmarkers[0]->category_type_id)}}" class="btn btn-success btn-xs" role="button">View By Totals</a> 
 
                <a href="{{route('AllBookMarkersrecordsreport', $bookmarkers[0]->category_type_id)}}" class="btn btn-primary btn-xs" role="button">View All</a> 
     </div>
       
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20"> Company List</h2>
        <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company Name</th>
                        <th>Trading Name</th>
                        <th>License No</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookmarkers as $bookmarker)
                    <tr>
                        <td>{{ $bookmarker->company_id }}</td>
                        <td>{{ $bookmarker->company_name }}</td>
                        <td>{{ $bookmarker->trading_name }}</td>
                        <td>{{ $bookmarker->license_no }}</td>
                        <td>{{ $bookmarker->email }}</td>
                        <td>{{ $bookmarker->physicaladdress }}</td>
    
                     
                        <td>
                        <!-- <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button> -->
                        <a href="{{route('reportsview',$bookmarker->company_id)}}" class="btn btn-info btn-xs" role="button">View</a> 
                          
                    
                       
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-bookmarkerscompany-component/>
</div>
@endsection
