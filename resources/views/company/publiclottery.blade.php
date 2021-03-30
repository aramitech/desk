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
                    <h4>Public Lottery Company</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Lottery Company</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcompany" type="button">
                        Add Public Lottery Company
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
    <h2 class="h4 pd-20">Public Lottery Company List</h2>
        <div class="pb-20">
        <table class="table hover  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company Name</th>
                        <th>Trading Name</th>
                        <th>License No</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Date</th>       <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->company_id }}</td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->trading_name }}</td>
                        <td>{{ $company->license_no }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->physicaladdress }}</td>
                        <td>{{ $company->created_at->format("y-M-d") }}</td>
                     
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                   <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editcompany{{$company->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('publiclotterycompanydelete',{{$company}})"><i class="dw dw-delete-3"></i> Delete</button>
                               </div> 
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editcompany{{$company->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-company-component :companydata="{{ json_encode($company)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-company-component/>
</div>
@endsection
