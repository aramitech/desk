<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>{{ config('app.name')}} </title>

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
<!-- <h3 align="center">COMPANY LETTER HEAD</h3> -->
<h3 align="center">PUBLIC GAMING RETURNS FORM</h3>
<img style="width: 180px;" src="" alt="">
<div style="width: 100%; clear: both;">
</div>

</div>


<div style="width: 100%; padding: 20px">

@foreach($bcompanies as $bcompany)


<table>
    <tr style="text-align:left">
        <th align="left"><h4><b>NAME OF LICENSEE</b> : {{ $bcompany->company_name}}</h4>
        <h4>LICENSEE NO: <strong class="weight-600">{{ $bcompany->license_no}}</strong></h4>
        <h4>RETURN FOR THE PERIOD OF: <strong class="weight-600">{{ request()->from ?? '....'}}</strong></h4>
        </th>
        <th align="left">
        <h4>TRADING AS :  {{ $bcompany->trading_name}}</h4>
        <h4>DATE :  {{ date('Y-m-d H:i:s') }}<h4>
        <h4>TO : {{ request()->to ?? '....'}}</h4>
        </th>
    </tr>
</table>
<hr />
<table>
    <thead>
        <tr>
            <th class="table-plus">#</th>
            <th>Date</th>
           
                        <th>Sales</th>
                        <th>Payouts</th>
                        <th>GGR </th>
                        <th>WHT</th>
        </tr>
    </thead>
    <tbody>
    @php $sum=0;
    $sales=0;
				$payouts=0;
				$ggr=0;
				$wht=0;
				$ggr=0;
    @endphp
        @foreach($publicgamings as $publicgaming)
        @php
        $sales +=$publicgaming->sales ;
				 $payouts +=$publicgaming->payouts ;
				 $ggr +=$publicgaming->ggr ;
				 $wht +=$publicgaming->wht ;
				 $ggr +=$publicgaming->ggr ;
    @endphp
        <tr>
            <td>{{ $publicgaming->publicgaming_id }}</td>
            <td>{{ $publicgaming->date }}</td>
        
            <td>{{ $publicgaming->sales }}</td>
            <td>{{ $publicgaming->payouts }}</td>
            <td>{{ $publicgaming->ggr }}</td>
            <td>{{ $publicgaming->wht }}</td>
       
        </tr>
    @endforeach
    </tbody><tbody>
			<th colspan="2">Total</th>
         
            <td >{{ $sales }}</td>
			<td >{{ $payouts }}</td>
			<td >{{ $ggr }}</td>
			<td >{{ $wht }}</td>
		
            
             </tbody>
</table>
  
@endforeach
<table>
    <tr style="text-align:left">
        <!-- <th align="left"><h4><b>ATTENDANT / CLERK.....................</b> ......</h4> -->
        </th>
        <th align="left">
        <!-- <h4>MANAGER/ SUPERVISOR ........................</h4> -->
        </th>
    </tr>
    <tr>
        <td colspan="2">
        <h4></h4>
        <h4></h4>
        </td>
    </tr>
    <h3 align="center"></h3>
</table>
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

<p>
{{ config('app.name')}}
</p>
</footer>

</body>
</html>