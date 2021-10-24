<?php
	if(Auth::guard('admin')->check())
	{
		
		if((Auth::guard('admin')->user()->twofa) == 0)
		{
			//redirect to OTP page
			echo '<script>window.location.href = "/desk/public/otp-verify"</script>';
		}
		
	}
?>

<?php
	if(Auth::guard('web')->check())
	{
		
		if((Auth::guard('web')->user()->twofa) == 0)
		{
			//redirect to user OTP page
			echo '<script>window.location.href = "/desk/public/otp-verify-user"</script>';
		}
		
	}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> @yield('title') - {{ config('app.name')}}</title>
    <link rel="apple-touch-icon" href="{{ asset('tyu/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tyu/app-assets/images/ico/favicon-16x16e.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/charts/apexcharts.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/card-analytics.css')}}">
    <!-- END: Page CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css')}}">


    <!-- BEGIN: Page Calender CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/plugins/calendars/fullcalendar.css')}}">
    <!-- END: Page CSS-->


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/calendars/extensions/daygrid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/calendars/extensions/timegrid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/assets/css/style.css')}}">
    <!-- END: Custom CSS-->



    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Todo Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/app-todo.css')}}">
    <!-- END: Page CSS-->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/tables/ag-grid/ag-grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css')}}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/app-user.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/aggrid.css')}}">
    <!-- END: Page CSS-->





    
    <script src="{{ asset('tables/jquery-3.5.1.js')}}"></script> 
	  <script src="{{ asset('tables/dataTables.bootstrap4.min.js')}}"></script>
	  <script src="{{ asset('tables/jquery.dataTables.min.js')}}"></script> 
	  <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>






<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        button.dt-button.btn-primary{
            background:var(--bs-primary)!important;
            color:white;
        }
    </style>



</head>
<!-- END: Head-->
@include('vuexy.layouts.header4') 
<!-- BEGIN: Body-->

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('vuexy._partials.side2')   
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->
  
     @include('vuexy.layouts.footer')   
</body>
<!-- END: Body-->
<script src="{{ asset('js/app.js')}}"></script>


   <!-- BEGIN: Vendor JS-->
   <script src="{{ asset('tyu/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('tyu/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <!-- END: Page JS-->


    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>

    <!-- BEGIN: Vendor JS-->



    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/calendar/extensions/daygrid.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/calendar/extensions/timegrid.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/calendar/extensions/interactions.min.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/pages/app-todo.js')}}"></script>
    <!-- END: Page JS-->
	@if(isset($companyggrchart))
		{!! $companyggrchart->script() !!}
	@endif

	@if(isset($publiclotteryggrchart))
		{!! $publiclotteryggrchart->script() !!}
	@endif
	
	@if(isset($publicgamingggrchart))
		{!! $publicgamingggrchart->script() !!}
	@endif

	@if(isset($allCompaniesGraphchart))
		{!! $allCompaniesGraphchart->script() !!}
	@endif

  <!-- BEGIN: Page JS-->
  <script src="{{ asset('tyu/app-assets/js/scripts/extensions/fullcalendar.js')}}"></script>
    <!-- END: Page JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/modal/components-modal.js')}}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/charts/chart.min.js')}}"></script>
</html>