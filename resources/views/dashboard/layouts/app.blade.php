<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{ $title }}</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/feather-icon.css') }}">
    {{--    <!-- Plugins css start--> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/date-picker.css') }}">
    {{--    <!-- Plugins css Ends--> --}}
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/responsive.css') }}">

    @vite(['resources/css/app.css'])


    {{ $head ?? '' }}

</head>

<body onload="startTime()">
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">


        {{ $slot }}


    </div>
    <!-- latest jquery-->
    <script src="{{ asset('dashboard/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('dashboard/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('dashboard/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('dashboard/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('dashboard/assets/js/script.js') }}"></script>
    {{--    <script src="{{ asset('dashboard/assets/js/theme-customizer/customizer.js') }}"></script> --}}
    <!-- login js-->
    <!-- Plugin used-->
    {{ $javascript ?? '' }}
    @vite(['resources/js/app.js'])

</body>

</html>
