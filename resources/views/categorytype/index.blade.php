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
                    <h4>categorytypes</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">categorytypes</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addcategorytype" type="button">
                        Add categorytype
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
    <h2 class="h4 pd-20">categorytypes List</h2>
        <div class="pb-20">
            <table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Category Name</th>
               
                       
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorytypes as $categorytype)
                    <tr>
                        <td>{{ $categorytype->categorytypes_id }}</td>
                        <td>{{ $categorytype->categorytype }}</td>
             
                    
                        <td>
                            <div class="dropdown">
                                <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a> -->
                                <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <!-- <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editcategorytype{{$categorytype->id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>

                                    
                                    <button class="btn btn-sm btn-danger" @click="deleteItem('categorytypedelete',{{$categorytype}})"><i class="dw dw-delete-3"></i> Delete</button> -->
                                <!-- </div> -->
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="editcategorytype{{$categorytype->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-categorytype-component :categorytypedata="{{ json_encode($categorytype)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="assignrolecategorytype{{$categorytype->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <assignrole-categorytype-component :categorytypedata="{{ json_encode($categorytype)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-categorytype-component/>
</div>
@endsection
