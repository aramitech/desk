<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>{{  'Accounts' }} </title>

<style>
@page {
margin: 0px;
}
body {
font-size: 12px;
margin: 0px;
font-family: sans-serif;
}
div .inline {
color: black;
float: left;
line-height: 1;
font-size: 13px;
}
.row {
width: 100%;
}
div .row:after {
clear: both;
width: 100%;
}
.report-title {
float: left;
font-size: 1.3em;
font-weight: 100;
font-family: sans-serif;
text-align: center;
width: 100%;
}
.right {
float: right;
}
.header {
font-size: 12px;
color: #aaa;
line-height: 1.5;
}
table {
width: 100%;
border-collapse: collapse;
}
td {
margin: 0;
border: none;
padding: 5px;
text-align: left;
font-size: 12px;
border-bottom: #ddd 1px solid;
border-right: #ddd 1px solid;
border-top: #ddd 1px solid;
border-left: #ddd 1px solid;
}
tr {
border-bottom: #ddd 10px solid;
width: 100%;
}
th {
padding: 3px;
background: #eee;
border-bottom: 1px solid #eee;
font-size: 9px;
font-weight: bold;
color: black;
}
td a {
text-decoration: none;
color: black;
}
.summary-table {
width: 30%;
margin-bottom: 20px;
color: black
}
.summary-table tr {
border-bottom: #eee 0.5pt solid;
border-top: #eee 0.5pt solid
}
.key {
padding: 10px;
font-weight: bold;
background: #eee
}
.value {
padding: 10px;
text-align: center;
}
.col-md-6 {
width: 50%;
}
.col-md-2 {
width: 20%;
}
</style>




@yield('styles')
</head>
<body>


<div style="margin-top: 20px; width: 100%; text-align:center;">
{{--   <img src="../../../desk/public/tyu/app-assets/images/logo/logo.png" alt="company logo" width="133" height="133" />  --}}                         
                           
                                <div class="invoice-details mt-2">
                                    <h3>OFFICE OF THE PRESIDENT</h3>
                                    <h3> MINISTRY OF INTERIOR AND</h3>
                                    <h3>  CO-ORDINATION OF NATIONAL GOVERNMENT</h3>
                                    <h3> BETTING CONTROL AND LICENSING BOARD</h3>
                                  
<div style="width: 100%; clear: both;">
Telephone: 0111021400						              P. O.  Box 43977 – 00100,
Email : info@bclb.go.ke		  				              NAIROBI.	

</div>

</div>


<div style="width: 100%; padding: 20px">




<h1 align="center"> ACCOUNTS REPORT</h1>
<h2 align="right">  {{ $currentTime }}</h2>

<table class="table table-striped dataex-html5-selectors">  <thead>
              <thead>
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
                        <td>@if($bookmarker->accountscompany)
                        {{ $bookmarker->accountscompany->company_name }}
                          @endif

                        </td>
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
			<th style="clear: both;" colspan="3">Total</th>
		
		    <td style="clear: both;">{{ $application_fee }}</td>
			<td style="clear: both;">{{ $transfer_fee }}</td>
			<td style="clear: both;">{{ $annual_license_fee }}</td>
			<td style="clear: both;">{{ $investigation_fee_local }}</td>
            <td style="clear: both;">{{ $investigation_fee_foreign }}</td>
            <td style="clear: both;">{{ $premise_fee }}</td>
			<td style="clear: both;">{{ $renewal_fee }}</td>
            <td style="clear: both;">{{ $operating_fee }}</td>
            <td style="clear: both;">{{ $total_fee }}</td>
            
            </tbody>
            </table>
         <h3 align="left">  Prepared By: 
@if(Auth::guard('web')->check())
<u>{{ Auth::guard('web')->user()->name }}</u>
	
@elseif(Auth::guard('admin')->check())
<u>{{ Auth::guard('admin')->user()->name }}</u>
							@endif  

</h3>
</div>




                                                               
<div style="width: 100%; clear: both;">
</div>

<footer
style="position: absolute;
bottom: 0;
width: 100%;
text-align: center;
background-color: black;
padding: 10px;
color:#FFF;
line-height: 1.6;">


{{  'Accounts'}}
</footer>

</body>
</html>