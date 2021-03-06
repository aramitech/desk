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
                    <h4>auditLogs</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">auditLogs</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addauditLog" type="button">
                        Add auditLog
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
    <h2 class="h4 pd-20">auditLogs List</h2>
        <div class="pb-20">
            <table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>audit_module</th>
                        <th>audit_activity</th>
                        <th>Date</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auditLogs as $auditLog)
                    <tr>
                        <td>{{ $auditLog->audit_log_id }}</td>
                        <td>{{ $auditLog->audit_module }}</td>
                        <td>{{ $auditLog->audit_activity }}</td>
                        <td>{{ $auditLog->created_at }}</td>
                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editauditLog{{$auditLog->id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#assignroleauditLog{{$auditLog->id}}" type="button"><i class="dw dw-edit2"></i> Assign Role</button>

                                    
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('auditLogdelete',{{$auditLog}})"><i class="dw dw-delete-3"></i> Delete</button>
                                <!-- </div> -->
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="editauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-auditLog-component :auditLogdata="{{ json_encode($auditLog)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="assignroleauditLog{{$auditLog->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <assignrole-auditLog-component :auditLogdata="{{ json_encode($auditLog)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-auditLog-component/>
</div>
@endsection
