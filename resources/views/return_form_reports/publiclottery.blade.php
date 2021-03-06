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
                    <h4>Public Lottery</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Public Lottery</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div>
          
                </div>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Public Lottery List</h2>
        <div class="pb-20">
           
        <table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Date</th>
                
                    </tr>
                </thead>
                <tbody>
                @foreach($publiclotteries as $publiclottery)
                    <tr>
                        <td>{{ $publiclottery->publiclottery_id }}</td>
                        <td>{{ $publiclottery->company_name }}</td>
                        <td>{{ $publiclottery->return_for_of }}</td>
                        <td>{{ $publiclottery->return_to }}</td>
                        <td>{{ $publiclottery->date }}</td>
                        <td>{{ $publiclottery->total_tickets_sold }}</td>
                        <td>{{ $publiclottery->created_at->format("y-M-d") }}</td>


                  <td></td>
                    </tr>
                    <div class="modal fade" id="editpubliclottery{{$publiclottery->publiclottery_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-publiclottery-component :publiclotteryerdata="{{ json_encode($publiclottery)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-publiclottery-component/>
</div>
@endsection

           
       