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
                    <h4>BookMarkers</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BookMarkers</li>
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
    <h2 class="h4 pd-20">BookMarkers List</h2>
        <div class="pb-20">
        @include ('partials.filter-topups')
        <table class="table table stripe hover nowrap multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>License No</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Bets No</th>
                        <th>Date</th>  
                        <th class="datatable-nosort"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookmarkers as $bookmarker)
                    <tr>
                        <td>{{ $bookmarker->bookmarker_id }}</td>
                        <td>{{ $bookmarker->license_no }}</td>
                        <td>{{ $bookmarker->return_for_the_period_of }}</td>
                        <td>{{ $bookmarker->return_for_the_period_to }}</td>
                        <td>{{ $bookmarker->branch }}</td>
                        <td>{{ $bookmarker->date }}</td>
                        <td>{{ $bookmarker->bets_no }}</td>
                        <td>{{ $bookmarker->created_at->format("y-M-d") }}</td>
                        
                      <td></td>
                    </tr>
                    <div class="modal fade" id="editbookmarker{{$bookmarker->bookmarker_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <edit-bookmarker-component :bookmarkerdata="{{ json_encode($bookmarker)}}"/>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- ./main content card -->
    <add-bookmarker-component/>
</div>
@endsection

           
