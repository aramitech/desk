@extends('vuexy.layouts.master')
@section('title')
Category Types List:
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


         <!-- invoice functionality start -->
         <section class="invoice-print mb-1">
               <table>        
                    <tr>
                    
                        <td width="500">
                        <div class="col-sm-12 col-12 text-left pt-1">
               <div class="card">
                    <div class="card-header">                                             
                        <h4 class="card-title">Send Mail</h4>
                        <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>                  
                    </div>
                    <div class="card-content collapse">
                    <form action="{{ route('send-mail-accounts') }}" method="post">       
                    @csrf
                    <input type="text" name="subject" class="form-control" placeholder="Subject" aria-describedby="button-addon2">

<input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                            <div class="input-group-append" id="button-addon2">
                                <button type="submit" class="btn btn-primary btn-lg">Send Mail</button>
                            </form>
                    </div>
                    </div>  </div>   </div>    

                        </td>
                        <td width="500">   <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                        <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                      <a href="{{route('bookmarkerspdf')}}" class="btn btn-success"><i class="feather icon-download"></i> Download </a> 
                              <a href="{{route('exportExcelBookmarkers')}}" class="btn btn-warning"> <i class="feather icon-excel"></i> Export to Excel </a> 

                    
                    </div></div>  </div>  </td>
                        
                
                    </tr>
                   </table>

    </section>
                <!-- invoice functionality end -->
       <!-- users filter start -->

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
                                              PUBLIC LOTTERY  RECORDS:
                                        
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
                        <div class="card-content collapse">
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
                        <th>Total Tckets Sold</th>
                    
                        <th>Sales</th>
                        <th>Payouts</th>     
                        <th>GGR</th>  
                        <th>WHT</th>  
                      
                        <th>GGR TAX</th>  
                    </tr>
                </thead>

                <tbody>
                @php $total_tickets_sold=0;
				$sales=0;
				$payouts=0;
		
				$wht=0;
				$ggr=0;
                $ggrtax=0;
				@endphp
                    @foreach($publiclotteries as $bookmarker)
                    @php 
                $total_tickets_sold +=$bookmarker->total_tickets_sold ;
				 $sales +=$bookmarker->sales ;
				 $payouts +=$bookmarker->payouts ;
				 $wht +=$bookmarker->wht ;
				 $ggr +=$bookmarker->ggr ;
                 $ggrtax +=$bookmarker->ggrtax ;
    
				@endphp  <tr>
                        <td>{{ $bookmarker->publiclottery_id }}</td>
                        <td>                       
                        @if($bookmarker->publicLotterycompany) 
                        {{  $bookmarker->publicLotterycompany->company_name }}
                        @endif
                        </td>
                        <td>{{ $bookmarker->license_no }}</td>
                        <td>{{ $bookmarker->total_tickets_sold }}</td>
                   
                        <td>{{ $bookmarker->sales }}</td>
                        <td>{{ $bookmarker->payouts }}</td>
                        <td>{{ $bookmarker->ggr }}</td>

                        <td>{{ $bookmarker->wht }}</td>

                      
                        <td>{{ $bookmarker->ggrtax }}</td>
                
                    </tr>

                    @endforeach
                </tbody>

                <tbody>
			<th style="background-color:#aaf228" colspan="3">Total</th>
		
		    <td style="background-color:#aaf228" >{{ $total_tickets_sold }}</td>
			<td style="background-color:#aaf228" >{{ $sales }}</td>
			<td  style="background-color:#aaf228">{{ $payouts }}</td>
			<td style="background-color:#aaf228">{{ $ggr }}</td>
			<td style="background-color:#aaf228">{{ $wht }}</td>
            <td style="background-color:#aaf228">{{ $ggrtax }}</td>
            
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
