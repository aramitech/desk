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
                    <h4> Lottery Number</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lottery Number</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button">
                        Add  Record
                    </a>

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addlotteryshop" type="button">
                        Add  Lottery 
                    </a>
                    
                    <a class="btn btn-primary" href="{{ route('lotterynumbershop') }}" role="button" type="button">
                        View  Lottery Game
                    </a> -->


                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Public Lottery Numbers List</h2>
        <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                      
                          <th>Company</th>
                          <th>Lisence No</th>
                        <th>Lottery Game</th> 
                        <th>Lottery Numbers</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>       <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publiclotterylotterynumbers as $bookmarker)
                    <tr>
                        <td>{{ $bookmarker->publiclotterynumber_id }}</td>
                        <td>  @if($bookmarker->publicLotterycompany) 
                        {{  $bookmarker->publicLotterycompany->company_name }}
                        @endif
                        </td>
                        <td>{{ $bookmarker->license_no }}</td>
                        <td>{{ $bookmarker->lottery_name }}</td>
                        <td>{{ $bookmarker->lottery_number }}</td>
                   
                        <td>{{ $bookmarker->periodfrom }}</td>
                        <td>{{ $bookmarker->periodto }}</td>
                        <td>{{ $bookmarker->status }}</td>
                     
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$bookmarker->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                    {{--  <button class="btn btn-sm btn-danger" @click="deleteItem('bookmarkerscompanydelete',{{$bookmarker}})"><i class="dw dw-delete-3"></i> Delete</button>--}}
                                  <a class="btn btn-danger btn-sm" href="{{ route('records_delete_lotterynumber', $bookmarker->publiclotterynumber_id ) }}"  data-target="#smstext-{{ $bookmarker->publiclotterynumber_id }}"><i class="fa fa-plus"></i>Delete</a>
                               </div> 
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$bookmarker->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>


                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- ./main content card -->
    <add-lotteryshop-component/>

    </div>
    <!-- ./main content card -->
    <add-publiclottery-component/>
</div>
@endsection
