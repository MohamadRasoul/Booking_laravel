<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarOfficeResource;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\HotelResource;
use App\Http\Resources\RestaurantResource;
use App\Models\CarOffice;
use App\Models\Clinic;
use App\Models\Hotel;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maize\Markable\Models\Favorite;
use Spatie\QueryBuilder\QueryBuilder;

class FavoriteController extends Controller
{
    public function assignFavorite(int $model_Number, int $id)
    {
        $user = Auth::guard('api_user')->user();


        switch ($model_Number) {
            case 1: // restaurnat
                $restaurant = Restaurant::findOrFail($id);
                Favorite::toggle($restaurant, $user);
                break;
            case 2: // Hotel
                $hotel = Hotel::FindOrFail($id);
                Favorite::toggle($hotel, $user);
                break;
            case 3: // Clinic
                $clinic = Clinic::FindOrFail($id);
                Favorite::toggle($clinic, $user);
                break;
            case 4: // CarOffice
                $carOffice = CarOffice::FindOrFail($id);
                Favorite::toggle($carOffice, $user);
                break;
        }
        return response()->success(
            'your favorite is toggled success'
        );
    }
    public function getRestaurantFavorites()
    {

        $user = Auth::guard('api_user')->user();

        $restaurants = QueryBuilder::for(Restaurant::whereHasFavorite(
            $user
        ))
            ->allowedIncludes([
                'tableTypes',
                'user',
            ])
            ->with([
                'city',
                'favorites'
            ])
            ->get();


        // Return Response
        return response()->success(
            'this is all Restaurants',
            [
                "restaurants" => RestaurantResource::collection($restaurants),
            ]
        );
    }


    public function getHotelFavorites()
    {
        $user = Auth::guard('api_user')->user();
        $hotels = QueryBuilder::for(Hotel::whereHasFavorite(
            $user
        ))
            ->allowedIncludes([
                'tableTypes',
                'user',
            ])
            ->with([
                'city',
                'favorites'
            ])
            ->get();


        // Return Response
        return response()->success(
            'this is all hotels',
            [
                "hotels" => HotelResource::collection($hotels),
            ]
        );
    }


    public function getCarOfficeFavorites()
    {
        $user = Auth::guard('api_user')->user();
        $carOffices = QueryBuilder::for(Hotel::whereHasFavorite(
            $user
        ))

            ->allowedIncludes([
                'tableTypes',
                'user',
            ])
            ->with([
                'city',
                'favorites'
            ])
            ->get();


        // Return Response
        return response()->success(
            'this is all carOffices',
            [
                "carOffice" => CarOfficeResource::collection($carOffices),
            ]
        );
    }


    public function getClinicFavorites()
    {
        $user = Auth::guard('api_user')->user();
        $clinics = QueryBuilder::for(Clinic::whereHasFavorite(
            $user
        ))

            ->allowedIncludes([
                'tableTypes',
                'user',
            ])
            ->with([
                'city',
                'favorites'
            ])
            ->get();


        // Return Response
        return response()->success(
            'this is all clinics',
            [
                "clinic" => ClinicResource::collection($clinics),
            ]
        );
    }
}
