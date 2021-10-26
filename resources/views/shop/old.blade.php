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
                    <h4> SHop</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Shop</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addshop" type="button" data-backdrop="static" data-keyboard="false">
                        Add  Shop
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
    <h2 class="h4 pd-20"> Shop List</h2>
        <div class="pb-20">
        <table class="table hover  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company</th>
                        
                        <th>Shop Name</th>  
                         <th>Location</th>  
                         <th>Shop Number</th>   
                      <th>Action</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->shop_id }}</td>
                        <td> @if($shop->Shopcompany) 
                        {{  $shop->Shopcompany->company_name }}
                        @endif</td>
                        <td>{{ $shop->shop_name }}</td>    
                        <td>{{ $shop->location }}</td> 
                        <td>{{ $shop->shop_number }}</td>   
                        <td>
                            <div class="dropdown">
                                 <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                              <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewshopcompany{{$shop->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>

                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editshopcompany{{$shop->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                                   {{-- <button class="btn btn-sm btn-danger" @click="deleteItem('shopscompanydelete',{{$shop}})"><i class="dw dw-delete-3"></i> Delete</button> --}}
                                    <a class="btn btn-danger btn-sm" href="{{ route('shopo.delete', $shop->shop_id) }}"  data-target="#smstext-{{ $shop->shop_id }}"><i class="fa fa-plus"></i>Delete</a>

                               </div> 
                            </div>
                            </td>  <td></td>
                    </tr>
                    <div class="modal fade" id="editshopcompany{{$shop->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-shop-component :shopdata="{{ json_encode($shop)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewshopcompany{{$shop->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-shop-component :shopdata="{{ json_encode($shop)}}"/>
                        </div>
                    </div>
                  

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-shop-component/>
</div>
@endsection
