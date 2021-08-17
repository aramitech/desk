@extends('vuexy.layouts.master')
@section('title')
ACCOUNTS REPORT:
@endsection
@section('content')

<div id="app">
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                          
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                  
                                        <!-- users edit media object ends -->                           
                                        <!-- users edit account form start -->
 
                   
                                    <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                        <!-- users edit socail form start -->
                                        <form novalidate>
                                            <div class="row">
                                                <div class="col-12 col-sm-12">
                                                <div class="col-md-12 col-sm-12 text-right">
                <div>
           

               
                </div>
            </div>
                                                <h4 class="media-heading">   
                                                ACCOUNTS REPORT::
                                        
                                                </h4>
                                                <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                 



                  <!-- users filter start -->
                  <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Filters</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                    <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                    <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="users-list-filter">
                                    <form>
                                        <div class="row">
                                     
                                        <form>

<div class="col-12 col-sm-6 col-lg-3">
    <label for="users-list-role">Date From</label>
    <fieldset class="form-group">
    <input name="from" class="form-control form-control-sm form-control-line" type="date">
    </fieldset>
</div>
<div class="col-12 col-sm-6 col-lg-3">
    <label for="users-list-role">Date To</label>
    <fieldset class="form-group">
    <input name="to" class="form-control form-control-sm form-control-line" type="date">
    </fieldset>
</div>


<div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-status">Company</label>
                                                <fieldset class="form-group">
                                                <select id="input-order-item-farmer-id" name="company_id" class="form-control" style="width: 100%; border-color: #ebedf2;">
                                    <option value="">- Select -</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->company_id }}" data-credit="@if($company->company_name) 
                        {{  $company->accountscompany }}
                        @endif">   @if($company->company_name) 
                        {{  $company->company_name }}
                        @endif  </option>
                                    @endforeach
                                    </select>
                                                </fieldset>
                                            </div>

<div class="col-12 col-sm-6 col-lg-3">
<button type="submit" class="btn btn-primary">Search</button>

</div>
</form>
                                  

<script>
function goToPayBill(id) {
  window.location.href = "{{ route('companystatus') }}"+id;
}
function goToTestPage(id) {
  window.location.href = "{{ route('companystatus') }}"+id;
}
function goToCompany(id) {
  window.location.href = "{{ route('companystatus') }}"+id;
}
</script>

                             
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-verified">Companies</label>
                                                <fieldset class="form-group">
                                                    <!-- <select class="form-control" onchange="goToCompany(this.value)" id="users-list-verified">
                                                    <option value=""></option>
                                                    <option value="All">All</option>
                                                        <option value="BookMarkers">Bookmarkers</option>
                                                        <option value="PublicLoottery">Public Lottery</option>
                                                        <option value="PublicGaming">Public Gaming</option>

                                                   </select> -->
                                                </fieldset>
                                            </div>
                                      
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users filter end -->


                 
                                                
                                                <table class="table table-striped dataex-html5-selectors">               <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Company</th>
                          <th>MR NO</th>
                        
                        <th>Application Fee</th> 
                        <th>Transfer Fee</th>
                    
                        <th>Annual License Fee</th>
                        <th>Investigation Fee Local</th>     
                        <th>Investigation Fee Foreign</th>  
                        <th>Premise Fee</th>  
                        <th>Renewal Fee</th>
                        <th>Operating Fee</th>  
                        <th>Total</th> 
                    </tr>
                </thead>
                <tbody>

                @php $application_fee=0;
				$transfer_fee=0;
				$annual_license_fee=0;
				$investigation_fee_local=0;
				$investigation_fee_foreign=0;
				$premise_fee=0;
                $renewal_fee=0;
                $operating_fee=0;
                $total_fee=0;
				@endphp
                    @foreach($accounts as $bookmarker)
                    @php 
                $application_fee +=$bookmarker->application_fee ;
				 $transfer_fee +=$bookmarker->transfer_fee ;
				 $annual_license_fee +=$bookmarker->annual_license_fee ;
				 $investigation_fee_local +=$bookmarker->investigation_fee_local ;
				 $investigation_fee_foreign +=$bookmarker->investigation_fee_foreign ;
				 $premise_fee +=$bookmarker->premise_fee ;
                 $renewal_fee +=$bookmarker->renewal_fee ;
                 $operating_fee +=$bookmarker->operating_fee ;
                 $total_fee +=$bookmarker->operating_fee+$bookmarker->application_fee+$bookmarker->transfer_fee+$bookmarker->annual_license_fee +$bookmarker->investigation_fee_local+$bookmarker->investigation_fee_foreign+$bookmarker->premise_fee+$bookmarker->renewal_fee ;

				@endphp  <tr>
                        <td>{{ $bookmarker->accounts_id }}</td>
                        <td>{{ $bookmarker->accountscompany->company_name }}</td>
                        <td>{{ $bookmarker->mrno }}</td>
                        <td>{{ $bookmarker->application_fee }}</td>
                        <td>{{ $bookmarker->transfer_fee }}</td>
                   
                        <td>{{ $bookmarker->annual_license_fee }}</td>
                        <td>{{ $bookmarker->investigation_fee_local }}</td>
                        <td>{{ $bookmarker->investigation_fee_foreign }}</td>

                        <td>{{ $bookmarker->premise_fee }}</td>

                        <td>{{ $bookmarker->renewal_fee }}</td>
                        <td>{{ $bookmarker->operating_fee }}</td>
                        <td>{{ $bookmarker->operating_fee+$bookmarker->application_fee+$bookmarker->transfer_fee+$bookmarker->annual_license_fee +$bookmarker->investigation_fee_local+$bookmarker->investigation_fee_foreign+$bookmarker->premise_fee+$bookmarker->renewal_fee }}</td>
                    </tr>

                    @endforeach
                </tbody>
                <tbody>
			<th style="background-color:#aaf228" colspan="3">Total</th>
		
		    <td style="background-color:#aaf228">{{ $application_fee }}</td>
			<td style="background-color:#aaf228">{{ $transfer_fee }}</td>
			<td style="background-color:#aaf228">{{ $annual_license_fee }}</td>
			<td style="background-color:#aaf228">{{ $investigation_fee_local }}</td>
            <td style="background-color:#aaf228">{{ $investigation_fee_foreign }}</td>
            <td style="background-color:#aaf228">{{ $premise_fee }}</td>
			<td style="background-color:#aaf228">{{ $renewal_fee }}</td>
            <td style="background-color:#aaf228">{{ $operating_fee }}</td>
            <td style="background-color:#aaf228">{{ $total_fee }}</td>
            
            </tbody>
            </table>




                                            </div>  </div></div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <!-- <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                        Changes</button> -->
                                                    <!-- <button type="reset" class="btn btn-outline-warning">Reset</button> -->
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit socail form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
                <div class="modal" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Add
            </div>
            </div> </div> </div>
     
      <!-- ./main content card -->
      <add-bookmarkerscompany-component/>
</div>
</div>
</div>
</div>

@endsection
