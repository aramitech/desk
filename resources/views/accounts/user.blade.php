@php 
if(Auth::guard('admin')->check())
{
                $allowed = Auth::guard('admin')->user()->records_accounts;
}
                elseif(Auth::guard('web')->check())
                {
                    $allowed = Auth::guard('web')->user()->records_accounts;
                }
            
                @endphp

@extends('layouts.master')
@section('title')
Accounts
@endsection

@section('filter')
<form method="GET" action="{{ route('bookmarkers.inactivebookmarkers') }}">
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">From</label>
		<div class="col-sm-12 col-md-10">
			<input name="from" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">To</label>
		<div class="col-sm-12 col-md-10">
			<input name="to" class="form-control form-control-sm form-control-line" type="date">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-12 col-md-2 col-form-label">Not Recorded</label>
		<div class="col-sm-12 col-md-10">
			<input name="inactive" class="form-control form-control-sm form-control-line" type="checkbox">
		</div>
	</div>
	<div class="text-right">
		<button type="submit" class="btn btn-primary">Search</button>
	</div>
</form>
@endsection


@section('content')
<div id="app">
    <!-- ./header and breadcrumbs -->
    <div class="page-header">
        <div class="row">
            
            <div class="col-md-12 col-sm-12 text-right">
                <div>
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#addbookmarkers" type="button">
                        Add Record
                    </a> -->
                    
                    <!-- <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#uploadbookmarkers" type="button">
                    <i class="icon-copy fa fa-upload" aria-hidden="true">Upload Record</i>   
                    </a> -->
                    
                </div>
                <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg" data-backdrop="static" data-keyboard="false">
               Records</a>
            </div>
        </div>
    </div>
    <!-- ./header and breadcrumbs -->
    <!-- main content card -->
    <div class="card-box mb-30">
    @include('layouts.messages')
    @include('layouts.errors')
    <h2 class="h4 pd-20">Accounts List</h2>
        <div class="pb-20">
           <!-- check user type logged in -->
           <add-user-accounts-component/>
 
        </div>
        <upload-bookmarker-component/>
    </div>
    <!-- ./main content card -->     
     
    

    <div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Accounts Records</h4>
    </div>
    <div class="modal-body">
 
    <table class="table table-striped table-bordered complex-headers">
    <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company </th>
                          <th>MR No</th>
                        
                        <th>Application F</th> 
                        <th>Transfer F</th>
                    
                        <th>Annual License F</th>
                        <th>Status</th>    
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                @if($allowed == 'Allowed')
                @foreach($accounts as $account)
                  
      

                  <tr>
                      <td>{{ $account->company_id }}</td>
                      <td> @if($account->accountscompany) 
                      {{  $account->accountscompany->company_name }}
                      @endif</td>
                      <td>{{ $account->mrno }}</td>
                      <td>{{ $account->application_fee }}</td>
                      <td>{{ $account->transfer_fee }}</td>
                 
                      <td>{{ $account->annual_license_fee }}</td>
                      <td>{{ $account->status }}</td>
                   
                      <td>
                          <div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                  <i class="dw dw-more"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> 
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#viewbookmarkercompany{{$account->company_id}}" type="button"><i class="dw dw-edit2"></i> View</button>
                            {{--<a class="btn btn-primary btn-sm" href="{{ route('accountsedit', $account->accounts_id ) }}"  data-target="#smstext-{{ $account->accounts_id }}"><i class="fa fa-plus"></i>Edit</a>--}}

                                  <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editbookmarkercompany{{$account->company_id}}" type="button"><i class="dw dw-edit2"></i> Edit</button>
                              {{--  <button class="btn btn-sm btn-danger" @click="deleteItem('accountscompanydelete',{{$account}})"><i class="dw dw-delete-3"></i> Delete</button>--}}
                                <a class="btn btn-danger btn-sm" href="{{ route('records_delete', $account->accounts_id ) }}"  data-target="#smstext-{{ $account->accounts_id }}"><i class="fa fa-plus"></i>Delete</a>




                                
                             </div> 
                          </div>
                          </td> 
                  </tr>
                  <div class="modal fade" id="editbookmarkercompany{{$account->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <edit-accounts-component :bookmarkerdata="{{ json_encode($account)}}"/>
                      </div>
                  </div>

                  <div class="modal fade" id="viewbookmarkercompany{{$account->company_id}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                          <view-accounts-component :bookmarkerdata="{{ json_encode($account)}}"/>
                      </div>
                  </div>

                  
                  @endforeach

                  @else
                  
                  @endif
              </tbody>
          </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




</div>
@endsection

           
       