<x-dashboard-layout::app :title="$title">

    <x-slot name="head">
        {{ $head ?? '' }}
    </x-slot>

    <x-slot name="javascript">
        {{ $javascript ?? '' }}
    </x-slot >


    <!-- Page Header Start-->
    <x-dashboard-partial::header />

    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper" >
        <!-- Page Sidebar Start-->
        <x-dashboard-partial::sidebar />

        <!-- Page Sidebar Ends-->

        <div class="page-body" >
            <div class="container-fluid" >
                <div class="page-title" >
                    <div class="row" >
                        <div class="col-6" >
                            <h3 >{{$title}}</h3 >
                        </div >
                        <div class="col-6" >
                            <ol class="breadcrumb" >
                                <li class="breadcrumb-item" >
                                    <a href="index.html" >
                                        <i data-feather="home" ></i >
                                    </a >
                                </li >
                                <li class="breadcrumb-item" >Dashboard</li >
                                <li class="breadcrumb-item active" >{{$title}}</li >
                            </ol >
                        </div >
                    </div >
                </div >
            </div >


            {{ $slot }}

        </div >


        <!-- footer start-->
        <footer class="footer" >
            <div class="container-fluid" >
                <div class="row" >
                    <div class="text-center col-md-12 footer-copyright" >
                        <p class="mb-0" >Copyright 2023 © Booking Project By Mohamad Rasoul </p >
                    </div >
                </div >
            </div >
        </footer >
    </div >
</x-dashboard-layout::app >
