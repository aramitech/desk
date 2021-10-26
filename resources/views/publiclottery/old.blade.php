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
                    <h4>Public Lottery</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Lottery</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addpubliclottery" type="button" data-backdrop="static" data-keyboard="false">
                        Add Public Lottery
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
    <h2 class="h4 pd-20">Public Lottery List</h2>
        <div class="pb-20">
           
        <table class="table hover  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>License No</th>
                        <th>Toal Tickets</th>
                        <th>Sales</th>
                        <th>Payouts</th>
                        <th>GGR</th>
                        <th>WHT</th>
                        {{--  <th>Date</th> --}}
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($publiclotteries as $publiclottery)
                    <tr>
                        <td>{{ $publiclottery->publiclottery_id }}</td>
                        {{-- <td>{{ $publiclottery->publicLotterycompany->company_name }}</td>  --}}
                        <td>{{ $publiclottery->license_no }}</td> 
                        <td>{{ $publiclottery->total_tickets_sold }}</td> 
                        <td>{{ $publiclottery->sales }}</td>
                        <td>{{ $publiclottery->payouts }}</td>
                        <td>{{ $publiclottery->ggr }}</td>
                        <td>{{ $publiclottery->wht }}</td>
                        {{--   <td>{{ $publiclottery->created_at->format("y-M-d") }}</td> --}}


                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewpubliclottery{{$publiclottery->publiclottery_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    @if ( Auth::user()->editstatus == 'Allowed' )
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editpubliclottery{{$publiclottery->publiclottery_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                   
                                    
                                    @else   
                                    @endif
                                    @if ( Auth::user()->deletestatus == 'Allowed' )
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('publiclotterydelete',{{$publiclottery}})"><i class="dw dw-delete-3"></i> Delete</button>
                                    @else   
                                    @endif
                              
                              
                                <!-- </div> -->
                            </div>
                            </td>  
                    </tr>
                    <div class="modal fade" id="editpubliclottery{{$publiclottery->publiclottery_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-publiclottery-component :publiclotteryerdata="{{ json_encode($publiclottery)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewpubliclottery{{$publiclottery->publiclottery_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-publiclottery-component :publiclotteryerdata="{{ json_encode($publiclottery)}}"/>
                        </div>
                    </div>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-publiclottery-component/>
</div>
@endsection

           
       