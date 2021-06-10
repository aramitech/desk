<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr')}}">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui')}}">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.')}}">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app')}}">
    <meta name="author" content="PIXINVENT')}}">
    <title>To-Do - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{ asset('tyu/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('tyu/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet')}}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/vendors/css/vendors.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/app-assets/css/pages/app-todo.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('tyu/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar todo-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout')}}">

    <!-- BEGIN: Header-->
   
    <!-- END: Header-->





    @include('vuexy.layouts.header') 
<!-- BEGIN: Body-->

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('vuexy._partials.admin')   
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->
  








    <div class="sidenav-overlay')}}"></div>
    <div class="drag-target')}}"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light')}}">
        <p class="clearfix blue-grey lighten-2 mb-0')}}"><span class="float-md-left d-block d-md-inline-block mt-25')}}">COPYRIGHT &copy; 2021<a class="text-bold-800 grey darken-2" href="" target="_blank')}}"></a>All rights Reserved</span><span class="float-md-right d-none d-md-block')}}"><i class="feather icon-heart pink')}}"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button')}}"><i class="feather icon-arrow-up')}}"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('tyu/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('tyu/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('tyu/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('tyu/app-assets/js/scripts/pages/app-todo.js')}}"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>