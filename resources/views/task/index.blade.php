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
                <h2 class="h4 pd-20">Task List</h2>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Task </li>
                    </ol>
                </nav>
            </div>

           
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Task List</h2>
        <div class="pb-20">
        <table class="table hover  data-table-export nowrap">
                <thead>
                <tr>
                        <th class="table-plus">#</th>
                        <th>Title</th>
                          <th>Description</th>
                        
                        <th>Date</th> 
                             <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($todoes as $todo)

                    <tr>
                        <td>{{ $todo->task_id }}</td>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>{{ $todo->created_at }}</td>
                     
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$todo->task_id}}" type="button" data-backdrop="static" data-keyboard="false"><i class="dw dw-edit2"></i> Reply</button>
                                  <a class="btn btn-primary btn-sm" href="{{ route('records_confirm_task', $todo->task_id ) }}"  data-target="#smstext-{{ $todo->task_id }}"><i class="fa fa-plus"></i>Confirm</a>

                               
                               </div> 
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarkercompany{{$todo->task_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <confirm-task-component :taskdata="{{ json_encode($todo)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarkercompany{{$todo->task_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarkercompany-component :bookmarkerdata="{{ json_encode($todo)}}"/>
                        </div>
                    </div>

        
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- ./main content card -->
    <add-shop-component/>

    </div>
    <!-- ./main content card -->
    <add-bookmarkerscompany-component/>
</div>

@endsection
