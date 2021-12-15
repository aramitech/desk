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
                    <h4>Users</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#adduser" type="button" data-backdrop="static" data-keyboard="false">
                        Add User
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
    <h2 class="h4 pd-20">  Users List</h2> 
        <div class="pb-20">
            <table class="table table stripe hover nowrap  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Name</th>
                 
                        <th>P/F No</th>
                        <th>Section</th>
                        <th>Phone</th>
               
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
              
                        <td>{{ $user->perspnal_file_no }}</td>
                        <td>{{ $user->section }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>

                        <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                                    <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#edituser{{$user->id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                  {{--  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#assignroleuser{{$user->id}}" type="button"><i class="dw dw-edit2"></i> Assign Role</button>--}}

                                    <a href="{{ route('admins_user',$user->id)}}"> <button class="btn btn-primary btn-sm" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit">Role</i> </button></a>
                                    <!-- <a class="btn btn-danger btn-sm" href="{{ route('userss.delete', $user->id) }}"  data-target="#smstext-{{ $user->id }}"><i class="fa fa-plus"></i>Delete</a> -->

                                    <!-- <button class="btn btn-sm btn-danger" @click="deleteItem('users.delete',{{$user}})"><i class="dw dw-delete-3"></i> Delete</button> -->
                             
                                   
                             
                               </div> 
                            </div>


                        </td>
                    </tr>
                    <div class="modal fade" id="edituser{{$user->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-user-component :userdata="{{ json_encode($user)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="assignroleuser{{$user->id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <assignrole-user-component :userdata="{{ json_encode($user)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-user-component/>
</div>


<script type="text/css">
@import url('https://fonts.googleapis.com/css?family=Lato:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Lato', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  place-items: center;
  background: #0069d9;
  font-family: 'Lato', sans-serif;
}
.wrapper{
  display: inline-flex;
  background: #fff;
  height: 100px;
  width: 400px;
  align-items: center;
  justify-content: space-evenly;
  border-radius: 5px;
  padding: 20px 15px;
  box-shadow: 5px 5px 30px rgba(0,0,0,0.2);
}
.wrapper .option{
  background: #fff;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  margin: 0 10px;
  border-radius: 5px;
  cursor: pointer;
  padding: 0 10px;
  border: 2px solid lightgrey;
  transition: all 0.3s ease;
}
.wrapper .option .dot{
  height: 20px;
  width: 20px;
  background: #d9d9d9;
  border-radius: 50%;
  position: relative;
}
.wrapper .option .dot::before{
  position: absolute;
  content: "";
  top: 4px;
  left: 4px;
  width: 12px;
  height: 12px;
  background: #0069d9;
  border-radius: 50%;
  opacity: 0;
  transform: scale(1.5);
  transition: all 0.3s ease;
}
input[type="radio"]{
  display: none;
}
#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2{
  border-color: #0069d9;
  background: #0069d9;
}
#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot{
  background: #fff;
}
#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before{
  opacity: 1;
  transform: scale(1);
}
.wrapper .option span{
  font-size: 20px;
  color: #808080;
}
#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span{
  color: #fff;
}
</script>


@endsection

