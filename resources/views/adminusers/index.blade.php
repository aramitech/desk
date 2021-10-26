@extends('layouts.master')
@section('title')
   Super Admin
@endsection
@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Admin User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin User</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#adminuser" type="button" data-backdrop="static" data-keyboard="false">
                        Add Admin User
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
    <h2 class="h4 pd-20">Company List</h2>
        <div class="pb-20">
        <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Tocken</th>
                        <th>Date</th>  <th></th>
            
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminusers as $adminuser)
                    <tr>
                        <td>{{ $adminuser->admin_id }}</td>
                        <td>{{ $adminuser->name }}</td>
                        <td>{{ $adminuser->email }}</td>
                        <td>{{ $adminuser->remember_token }}</td>        
                        <td>{{ $adminuser->created_at->format("y-M-d") }}</td>
   
                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editadminuser{{$adminuser->admin_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('adminuserdelete',{{$adminuser}})"><i class="dw dw-delete-3"></i> Delete</button>
                                <!-- </div> -->
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editadminuser{{$adminuser->admin_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-adminuser-component :adminuserdata="{{ json_encode($adminuser)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-adminuser-component/>
</div>
@endsection
