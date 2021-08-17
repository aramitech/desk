@extends('vuexy.layouts.master')
@section('title')
PUBLIC GAMING REPORT
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
                                              Public Gaming  Records:
                                        
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
                                            <!-- <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-role">PayBill</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" onchange="goToPayBill(this.value)" id="users-list-role">
                                                        <option value="">All</option>
                                                        <option value="HavePayBill">Have PayBill</option>
                                                        <option value="NoPayBill">No PayBill</option>
                                                    </select>
                                                </fieldset>
                                            </div> -->
                                  

<script>
function goToPayBill(id) {
  window.location.href = "{{ route('companystatus') }}"+id;
}
function goToTestPage(id) {
  window.location.href = "{{ route('companystatus') }}"+id;
}

</script>

                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-status">Status</label>
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
	                                    	<button type="submit" class="btn btn-primary">Search</button>
	
                                            </div>
                                            </form>



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
                       
                        
                        <th>Licensee Name</th> 
                        <th>Sales</th>
                    
                        <th>Payouts</th>
                        <th>WHT</th>     
                        <th>GGR</th>  
                         
                        <th>GGR TAX</th>  
                        <th>Sales Slot</th>
                        <th>Payouts Slot</th>  
                        <th>WHT Slots</th>  
                        <th>GGR Slot</th>  
                        <th>GGR Tax Slot</th>  
                    </tr>
                </thead>
                <tbody>
                   @php $sales=0;
				$payouts=0;
				$wht=0;
				$ggr=0;
				$ggrtax=0;
				$salesslot=0;
                $payoutsslot=0;
                $whtslot=0;
                $ggrslot=0;
                $ggrtaxslot=0;
				@endphp

                    @foreach($publicgamings  as $publicgaming)
                    @php 
                $sales +=$publicgaming->sales ;
				 $payouts +=$publicgaming->payouts ;
				 $wht +=$publicgaming->wht ;
				 $ggr +=$publicgaming->ggr ;
				 $ggrtax +=$publicgaming->ggrtax ;
				 $salesslot +=$publicgaming->salesslot ;
                 $payoutsslot +=$publicgaming->payoutsslot ;
                 $whtslot +=$publicgaming->whtslot ;
                 $ggrslot +=$publicgaming->ggrslot ;
                 $ggrtaxslot +=$publicgaming->ggrtaxslot ;
				@endphp <tr>
                        <td>{{ $publicgaming->publicgaming_id }}</td>
                        <td>                       
                        @if($publicgaming->publicGamingcompany) 
                        {{  $publicgaming->publicGamingcompany->company_name }}
                        @endif
                        </td>
                        <td>{{ $publicgaming->license_no }}</td>
                        <td>{{ $publicgaming->sales }}</td>
                   
                        <td>{{ $publicgaming->payouts }}</td>
                        <td>{{ $publicgaming->wht }}</td>
                        <td>{{ $publicgaming->ggr }}</td>
                        <td>{{ $publicgaming->ggrtax }}</td>

                        <td>{{ $publicgaming->salesslot }}</td>
                        <td>{{ $publicgaming->payoutsslot }}</td>
                        <td>{{ $publicgaming->whtslot }}</td>
                        <td>{{ $publicgaming->ggrslot }}</td>
                        <td>{{ $publicgaming->ggrtaxslot }}</td>
            
                    </tr>

                    @endforeach
                </tbody>
                <tbody>
			<th style="background-color:#aaf228" colspan="3">Total</th>
		
		    <td style="background-color:#aaf228">{{ $sales }}</td>
			<td style="background-color:#aaf228">{{ $payouts }}</td>
			<td style="background-color:#aaf228">{{ $wht }}</td>
			<td style="background-color:#aaf228">{{ $ggr }}</td>
			<td style="background-color:#aaf228">{{ $ggrtax }}</td>
			<td style="background-color:#aaf228">{{ $salesslot }}</td>
            <tdstyle="background-color:#aaf228" >{{ $payoutsslot }}</td>
            <td style="background-color:#aaf228">{{ $whtslot }}</td>
            <td style="background-color:#aaf228">{{ $ggrslot }}</td>
            <td style="background-color:#aaf228">{{ $ggrtaxslot }}</td>
            
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
