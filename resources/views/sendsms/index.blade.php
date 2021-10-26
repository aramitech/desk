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
                    <h4>SendSms</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">SendSms</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addsms" type="button" data-backdrop="static" data-keyboard="false">
                         Send SMS To Company
                    </a>

                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#sendsmstocategory" type="button" data-backdrop="static" data-keyboard="false">
                         Send SMS To Category
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
    <h2 class="h4 pd-20">SendSms List</h2>
        <div class="pb-20">
           
        <table class="table table stripe hover nowrap  data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Sms </th>
            
                        <th>Sms No</th>
                        <th>Date</th>
                    
         
                    
                
                    </tr>
                </thead>
                <tbody>
                @foreach($sendsmsis as $bookmarker)
               {{-- @if ( Auth::user()->records_send_sms == 'Allowed' ) --}}

                    <tr>
                        <td>{{ $bookmarker->sendsms_id }}</td>
                        <td>{{ $bookmarker->message }}</td>
              
                        <td>{{ $bookmarker->company_id }}</td>
                        <td>{{ $bookmarker->created_at }}</td>

                          
                    </tr>
                    <div class="modal fade" id="editbookmarker{{$bookmarker->sendsms_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>

                    <div class="modal fade" id="viewbookmarker{{$bookmarker->sendsms_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <view-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                 {{--   @else   
                @endif--}}
                    @endforeach
                </tbody>
            </table>
        </div>
        <add-sendsmscompanycategory-component/>

    </div>
    <!-- ./main content card -->
     
    <add-sendsms-component/>
 
</div>
@endsection

           
       