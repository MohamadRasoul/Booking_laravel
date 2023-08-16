<x-dashboard-layout::dashboard title="Dashboard For this Month">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                <div class="card">
                    <div class="p-0 card-body">
                        <div class="m-0 row chart-main">
                            <div class="p-0 col-xl-3 col-md-6 col-sm-6 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{$restaurantAddThisMonth}}</h4><span>Restaurant Added  </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-0 col-xl-3 col-md-6 col-sm-6 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart1 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{$hotelAddThisMonth}}</h4><span>Hotel Added</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-0 col-xl-3 col-md-6 col-sm-6 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart2 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{$carOfficeAddThisMonth}}</h4><span>Car Office Added</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-0 col-xl-3 col-md-6 col-sm-6 box-col-6">
                                <div class="border-none media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart3 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{$clinicAddThisMonth}}</h4><span>Clinic Added</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>{{$restaurantBookingThisMonth}}</h4>
                                <span>Restaurant Booking</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 chart_data_right second d-none">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>{{$hotelBookingThisMonth}}</h4>
                                <span>Hotel Booking</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>{{$carOfficeBookingThisMonth}}</h4>
                                <span>Car Office Booking</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 chart_data_right second d-none">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body right-chart-content">
                                <h4>{{$clinicBookingThisMonth}}</h4>
                                <span>Clinic Booking</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</x-dashboard-layout::dashboard>
