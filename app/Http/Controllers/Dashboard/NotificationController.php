<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Notification\StoreNotificationRequest;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\SendFirebaseNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotificationController extends Controller
{

    public function index(): View
    {

        $notifications = Notification::latest()->with('notifiable')->get();


        return view(
            'dashboard.pages.notification.index',
            compact('notifications')
        );

    }


    public function store(StoreNotificationRequest $request): RedirectResponse
    {
        $users = User::all();

        // Store Notification
        \Illuminate\Support\Facades\Notification::send(
            $users,new SendFirebaseNotification(
                ...$request->validated()
            )
        );

        return back();
    }


    public function destroy(Notification $notification): RedirectResponse
    {
        // Delete Notification
        $notification->delete();

        return back();
    }
}
