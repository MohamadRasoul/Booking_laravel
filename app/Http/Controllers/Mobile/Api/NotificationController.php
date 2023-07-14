<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    public function index()
    {
        // Get Data
        $user = \Auth::guard('api_user')->user();
        $notifications = $user->notifications()->latest();



        // Return Response
        return response()->success(
            'this is all Notifications',
            [
                "notifications" => NotificationResource::collection((clone $notifications)->simplePaginate(request()->perPage ?? $notifications->count())),
            ]
        );
    }

}
