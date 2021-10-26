<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
<title>{{  'Registry' }} </title>
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
                        <img src="http://localhost:8000/desk/public/tyu/app-assets/images/logo/logo.png" alt="" width="133" height="133" />                           
                           
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




<h1 align="center"> REGISTRY REPORT</h1>

<table>  <thead>
                    <tr>
                        <th class="table-plus">#</th>
                        <th>class</th>
                          <th>Subject</th>
                        
                        <th>Number</th> 
                        <th>File Name</th>
                        <th>Volume</th> 

                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($registries as $bookmarker)
          
                    <tr>
                        <td>{{ $bookmarker->allpref }}</td>
                        <td>{{ $bookmarker->class }}</td>
                        <td>{{ $bookmarker->subject }}</td>
                        <td>{{ $bookmarker->serial_number }}</td>
                        <td>{{ $bookmarker->file_name }}</td>
                        <td>{{ $bookmarker->volume }}</td>
  
                     
                      
                    </tr>
         

        
                    @endforeach
                </tbody>
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


{{  'Registry'}}
</footer>

</body>
</html>