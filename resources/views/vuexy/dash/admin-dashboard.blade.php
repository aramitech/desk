@extends('vuexy.layouts.master4')
@section('title')
    Admin
@endsection
@section('content')

<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <br><br><br><br><br>

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                 
				 
				 
				 
				 
				 
				 
				           <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general"  href="{{ route('taskindex') }}" aria-expanded="true">
<H3 >Bookmarkers Graph  </H3></a>

</li></ul>
                                </div>
								
								
                    <div class="card-box mb-30">
       
            <div id="companyggrchart">
                {!! $companyggrchart->container() !!}
            </div>
    </div>




    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general"  href="{{ route('taskindex') }}" aria-expanded="true">
<H3 >Most Recent Task  </H3></a>

</li></ul>
</div></div>

                                <table class="table table-striped dataex-html5-selectors">               <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>Description</th>
                       
                        
                        <th>Status</th> 
                
                    
                   
                    </tr>
                </thead>
                <tbody>
        
               
                @foreach($todoes as $key => $bookmarker )
                 <tr>
                 <th scope="row">{{ ++$key }}</th>
                        <td>{{ $bookmarker->description }}</td>

                        <td>{{ $bookmarker->status }}</td>
    
                    </tr>

                   
                                 @endforeach
                </tbody>
 
            </table>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                              <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title"> </h4>
                                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
<H3 >Public Lottery  </H3></a>

</li></ul>
                                </div>



                                <div class="card-box mb-30">
     
		<!-- <input type="button" onclick="printDiv('printableArea')" value="Print" /> -->
                       
            <div id="publiclotteryggrchart"><div id="printableArea">
                {!! $publiclotteryggrchart->container() !!}
				</div> 




    <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">                 <li class="nav-item">
              <a class="nav-link d-flex py-75 active" id="account-pill-general"  href="{{ route('taskindex') }}" aria-expanded="true">
<H3 >Most Recent Task  </H3></a>

</li></ul>
</div></div>



                       <table class="table zero-configuration">              <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        
            
                        <th>Name</th>
                        <th>Email </th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>

              
                @foreach($events as $auditLog)
                     <tr>
                        <td>{{ $auditLog->audit_log_id }}</td>
                        <td>{{ $auditLog->name }}</td>
                    
                        <td>{{ $auditLog->email }}</td>
                        <td>{{ $auditLog->created_at }}</td>
                   
                    </tr>

                    @endforeach
                </tbody>
    
            </table>
                            </div>
                        </div>
                    </div>
				 
				 
				 

				 
				 
				 
				 
				 
							         
				 
				 
				 
				 
				 
				 
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

@endsection
