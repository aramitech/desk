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
                <div> 
                <a href="{{route('publiclotteryAllreport', $publiclotteries[0]->category_type_id)}}" class="btn btn-info btn-xs" role="button">View All Public Lottery</a> 
          
                 </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Public Lottery Company List</h2>
        <div class="pb-20">
        <table class="table hover multiple-select-row data-table-export nowrap">
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
                    @foreach($publiclotteries as $publiclottery)
                    <tr>
                        <td>{{ $publiclottery->company_id }}</td>
                        <td>{{ $publiclottery->company_name }}</td>
                        <td>{{ $publiclottery->trading_name }}</td>
                        <td>{{ $publiclottery->license_no }}</td>
                        <td>{{ $publiclottery->email }}</td>
                        <td>{{ $publiclottery->physicaladdress }}</td>
    
                     
                        <td>
                        <!-- <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editpubliclotterycompany{{$publiclottery->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button> -->
                        <a href="{{route('reportsview_publiclottery',$publiclottery->company_id)}}" class="btn btn-info btn-xs" role="button">View</a> 
                          
                    
                       
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editpubliclotterycompany{{$publiclottery->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-publiclotterycompany-component :publiclotterydata="{{ json_encode($publiclottery)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-publiclotteryscompany-component/>
</div>
@endsection
