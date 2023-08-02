<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="index.html">
                <img class="img-fluid for-light" src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="">
                <img class="img-fluid for-dark" src="{{ asset('dashboard/assets/images/logo/logo_dark.png') }}"
                    alt="">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left">
                </i>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i>
            </div>

        </div>
        <div class="logo-icon-wrapper">
            <a href="index.html">
                <img class="img-fluid" src="{{ asset('dashboard/assets/images/logo/logo-icon.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left">
                </i>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="index.html">
                            <img class="img-fluid" src="{{ asset('dashboard/assets/images/logo/logo-icon.png') }}"
                                alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back
                            </span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true">
                            </i>
                        </div>

                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Super Admin
                            </h6>

                        </div>

                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                            <i data-feather="trello">
                            </i>
                            <span>Dashboard
                            </span>
                        </a>

                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.index') }}">
                            <i data-feather="user">
                            </i>
                            <span>Admins
                            </span>
                        </a>

                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href={{ route('city.index') }}>
                            <i data-feather="map-pin">

                            </i>
                            <span>Cities</span>

                        </a>

                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href={{ route('notification.index') }}>
                            <i data-feather="bell"></i>
                            <span>Notification
                            </span>
                        </a>

                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Places
                            </h6>
                        </div>
                    </li>

                    {{-- Car Office --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label>
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="truck"></i>
                            <span class="">{{ 'Car Office' }}</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="" href="{{ route('carOffice.index') }}">car Offices</a></li>
                            <li><a class="" href="{{ route('carOffice.carType.index') }}">car type</a></li>
                        </ul>
                    </li>


                    {{-- Resturant --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label>
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="coffee"></i>
                            <span class="">Resturants </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="" href="{{ route('restaurant.index') }}">resturants</a></li>
                            <li><a class="" href="{{ route('restaurant.tableType.index') }}">table type</a></li>
                        </ul>
                    </li>


                    {{-- Hotel --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label>
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="home"></i>
                            <span class="">Hotel </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="" href="{{ route('hotel.index') }}">hotels</a></li>
                            <li><a class="" href="{{ route('hotel.roomType.index') }}">room Type</a></li>
                        </ul>
                    </li>


                    {{-- Clinic --}}
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label>
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="plus-circle"></i>
                            <span class="">Clinic </span></a>
                        <ul class="sidebar-submenu">
                            <li><a class="" href="{{ route('clinic.index') }}">clinic</a></li>
                            <li><a class="" href="{{ route('clinic.clinicSpecialization.index') }}">clinic
                                    Specialization</a></li>
                        </ul>
                    </li>


                </ul>

            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right">
                </i>
            </div>

        </nav>

    </div>

</div>
