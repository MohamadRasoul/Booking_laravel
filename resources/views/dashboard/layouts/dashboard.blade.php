<x-dashboard-layout::app :title="$title">

    <x-slot name="head">
        {{ $head ?? '' }}
    </x-slot>

    <x-slot name="javascript">
        {{ $javascript ?? '' }}
    </x-slot>





    <!-- Page Header Start-->
    <x-dashboard-partial::header />

    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <x-dashboard-partial::sidebar />

        <!-- Page Sidebar Ends-->




        {{ $slot }}





        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center col-md-12 footer-copyright">
                        <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-dashboard-layout::app>
