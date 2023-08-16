<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarBooking;
use App\Models\CarOffice;
use App\Models\Clinic;
use App\Models\ClinicBooking;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\Restaurant;
use App\Models\RestaurantBooking;

class DashboardController extends Controller
{
    public function index()
    {


        $startThisMonthDate = now()->startOfMonth()->format('Y-m-d');
        $endThisMonthDate = now()->endOfMonth()->format('Y-m-d');


        $period = [
            $startThisMonthDate,
            $endThisMonthDate
        ];


        return view('dashboard.pages.dashboard')
            ->with([
                'restaurantAddThisMonth' => Restaurant::whereBetween('created_at', $period)->count(),
                'hotelAddThisMonth' => Hotel::whereBetween('created_at', $period)->count(),
                'carOfficeAddThisMonth' => CarOffice::whereBetween('created_at', $period)->count(),
                'clinicAddThisMonth' => Clinic::whereBetween('created_at', $period)->count(),


                'restaurantBookingThisMonth' => RestaurantBooking::whereBetween('created_at', $period)->count(),
                'hotelBookingThisMonth' => HotelBooking::whereBetween('created_at', $period)->count(),
                'carOfficeBookingThisMonth' => CarBooking::whereBetween('created_at', $period)->count(),
                'clinicBookingThisMonth' => ClinicBooking::whereBetween('created_at', $period)->count(),
            ]);

    }
}
