<?php
	if(Auth::guard('admin')->check())
	{
		
		if((Auth::guard('admin')->user()->twofa) == 0)
		{
			//redirect to OTP page
			echo '<script>window.location.href = "/otp-verify"</script>';
		}
		
	}
?>

<?php
	if(Auth::guard('web')->check())
	{
		
		if((Auth::guard('web')->user()->twofa) == 0)
		{
			//redirect to user OTP page
			echo '<script>window.location.href = "/otp-verify-user"</script>';
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

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/assets/css/style.css')}}">
    <!-- END: Custom CSS-->



    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/assets/css/style.css')}}">
    <!-- END: Custom CSS-->




</head>
<!-- END: Head-->
@include('vuexy.layouts.header') 
<!-- BEGIN: Body-->

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('vuexy._partials.admin')   
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
    <!-- <script src="{{ asset('tyu/app-assets/js/core/app.js')}}"></script> -->
    <script src="{{ asset('tyu/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <!-- END: Page JS-->




    <!-- BEGIN: Vendor JS-->

    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/modal/components-modal.js')}}"></script>
    <!-- END: Page JS-->


</html>