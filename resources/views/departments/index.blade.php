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
                    <h4> Departments</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Departments</li>
                    </ol>
                </nav>
            </div>

            
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                  
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                    <i class="icon-copy fa fa-plus-square" aria-hidden="true">  Add  Departments </i>         
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
    <h2 class="h4 pd-20">Departments List</h2>
        <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Department Name</th>

                    
                         <th>Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
          
                    <tr>
                        <td>{{ $department->departments_id }}</td>
                        <td>{{ $department->department_name }}</td>
    
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewdepartmentcompany{{$department->departments_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editdepartmentcompany{{$department->departments_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                <button class="btn btn-sm btn-danger" @click="deleteItem('departmentdelete',{{$department}})"><i class="dw dw-delete-3"></i> Delete</button>

                         

                               
                               </div> 
                            </div>
                            </td>  
                    </tr>
                    <div class="modal fade" id="editdepartmentcompany{{$department->departments_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-deparrtments-component :deparrtmentsdata="{{ json_encode($department)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewdepartmentcompany{{$department->departments_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-deparrtments-component :deparrtmentsdata="{{ json_encode($department)}}"/>
                        </div>
                    </div>

        
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- ./main content card -->
    <add-deparrtments-component/>

    </div>
    <!-- ./main content card -->
    <add-deparrtments-component/>
</div>

@endsection
