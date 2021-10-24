<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>{{  'BOOKMARKERS' }} </title>

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




<h1 align="center">BOOKMARKERS REPORT</h1>
<h2 align="right">  {{ $currentTime }}</h2>

<table class="table table-striped dataex-html5-selectors">  <thead>
              <thead>
              <tr>
                        <th class="table-plus">#</th>
                        <th>Company</th>
                       
                        
                        <th>Licensee Name</th> 
                        <th>Bets No</th>
                    
                        <th>Deposits</th>
                        <th>Total Sales</th>     
                        <th>Total Payout</th>  
                        <th>WHT</th>  
                        <th>GGR</th>
                        <th>GGR TAX</th>  
                    </tr>
                </thead>
                <tbody>

                @php $bets_no=0;
				$deposits=0;
				$total_sales=0;
				$total_payout=0;
				$wht=0;
				$ggr=0;
                $ggrtax=0;
				@endphp
                    @foreach($bookmarkers as $bookmarker)
                    @php 
                $bets_no +=$bookmarker->bets_no ;
				 $deposits +=$bookmarker->deposits ;
				 $total_sales +=$bookmarker->total_sales ;
				 $total_payout +=$bookmarker->total_payout ;
				 $wht +=$bookmarker->wht ;
				 $ggr +=$bookmarker->ggr ;
                 $ggrtax +=$bookmarker->ggrtax ;
    
				@endphp 
                  
                   <tr>
                        <td>{{ $bookmarker->bookmarker_id }}</td>
                        <td>                       
                        @if($bookmarker->bookmarkerscompany) 
                        {{  $bookmarker->bookmarkerscompany->company_name }}
                        @endif
                        </td>
                        <td>{{ $bookmarker->licensee_name }}</td>
                        <td>{{ $bookmarker->bets_no }}</td>
                        <td>{{ $bookmarker->deposits }}</td>
                        <td>{{ $bookmarker->total_sales }}</td>
                        <td>{{ $bookmarker->total_payout }}</td>
                        <td>{{ $bookmarker->wht }}</td>
                        <td>{{ $bookmarker->ggr }}</td>
                        <td>{{ $bookmarker->ggrtax }}</td>
                
                    </tr>    

                    @endforeach
                </tbody>

                <tbody>
			<td style="background-color:#aaf228" colspan="3">Total</td>
		
		    <td style="background-color:#aaf228">{{ $bets_no }}</td>
			<td style="background-color:#aaf228">{{ $deposits }}</td>
			<td style="background-color:#aaf228">{{ $total_sales }}</td>
			<td style="background-color:#aaf228">{{ $total_payout }}</td>
			<td style="background-color:#aaf228">{{ $wht }}</td>
			<td style="background-color:#aaf228">{{ $ggr }}</td>
            <td style="background-color:#aaf228">{{ $ggrtax }}</td>
            
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


{{  'BOOKMARKERS'}}
</footer>

</body>
</html>