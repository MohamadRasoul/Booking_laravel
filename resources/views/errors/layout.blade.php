<!DOCTYPE html>
<html lang="en" >
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="description"
          content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities." >
    <meta name="keywords"
          content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app" >
    <meta name="author" content="pixelstrap" >
    <link rel="icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon" >
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon" >
    <title >@yield('title')</title >
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
          rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/font-awesome.css') }}" >
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/icofont.css') }}" >
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/themify.css') }}" >
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/flag-icon.css') }}" >
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/feather-icon.css') }}" >
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/bootstrap.css') }}" >
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}" >
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/assets/css/color-1.css') }}" media="screen" >
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/responsive.css') }}" >
</head >
<body >
<!-- tap on top starts-->
<div class="tap-top" >
    <i data-feather="chevrons-up" ></i >
</div >
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div
    class="page-wrapper compact-wrapper"
    id="pageWrapper" >

    <div class="error-wrapper" >
        <div class="container" >
            <img class="img-100" src="{{ asset('dashboard/assets/images/other-images/sad.png') }}" alt="" >
            <div class="error-heading" >
                <h2 class="headline font-danger" > @yield('status') </h2 >
            </div >
            <div class="col-md-8 offset-md-2" >
                <p class="sub-content" >
                    @yield('message')
                </p >
            </div >

            <div >
                <a class="btn btn-danger-gradien btn-lg" href="{{ route('dashboard') }}" >BACK TO HOME PAGE</a >
            </div >
        </div >

    </div >


    <!-- latest jquery-->
    <script src="{{ asset('dashboard/assets/js/jquery-3.5.1.min.js') }}" ></script >
    <!-- Bootstrap js-->
    <script src="{{ asset('dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}" ></script >
    <!-- feather icon js-->
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather.min.js') }}" ></script >
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather-icon.js') }}" ></script >
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('dashboard/assets/js/config.js') }}" ></script >
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('dashboard/assets/js/script.js') }}" ></script >
    <!-- login js-->
    <!-- Plugin used-->
</body >
</html >
