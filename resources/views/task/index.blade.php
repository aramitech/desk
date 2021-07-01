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
                    <h4> Task</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Task</li>
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
                      
                            </td>  <td></td>
                    </tr>
                

        
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
