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
                    <h4>Public Gaming</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Gaming</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addpublicgaming" type="button" data-backdrop="static" data-keyboard="false">
                        Add Public Gaming
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
    <h2 class="h4 pd-20">Public Gaming List</h2>
        <div class="pb-20">
           
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Date</th>
                        <th>sales</th>
                        <th>payouts</th>
                        <th>WHT</th>
                        <th>GGR</th>
                        <th>Date</th>
                        <th>Date</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($publicgamings as $publicgaming)
                    <tr>
                        <td>{{ $publicgaming->publicgaming_id }}</td>
                        <td>{{ $publicgaming->date }}</td>
                        <td>{{ $publicgaming->sales }}</td>
                        <td>{{ $publicgaming->payouts }}</td>
                        <td>{{ $publicgaming->wht }}</td>
                        <td>{{ $publicgaming->ggr }}</td>
                        <td>{{ $publicgaming->created_at->format("y-M-d") }}</td>


                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewpublicgaming{{$publicgaming->publicgaming_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                   
                                    @if ( Auth::user()->editstatus == 'Allowed' )
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editpublicgaming{{$publicgaming->publicgaming_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>

                                  
                                    
                                    @else   
                                    @endif
                                    @if ( Auth::user()->deletestatus == 'Allowed' )  
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('publicgamingdelete',{{$publicgaming}})"><i class="dw dw-delete-3"></i> Delete</button>
                                    @else   
                                    @endif
                                
                                
                                <!-- </div> -->
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editpublicgaming{{$publicgaming->publicgaming_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-publicgaming-component :publicgamingerdata="{{ json_encode($publicgaming)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewpublicgaming{{$publicgaming->publicgaming_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-publicgaming-component :publicgamingerdata="{{ json_encode($publicgaming)}}"/>
                        </div>
                    </div>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-publicgaming-component/>
</div>
@endsection

           
       