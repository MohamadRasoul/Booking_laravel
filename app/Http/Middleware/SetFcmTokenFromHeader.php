<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetFcmTokenFromHeader
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $fcm_token = $request->header('fcmtoken');
        $platform = $request->header('platform');

        try {

            if ($request->is('api/admin/*') && Auth::guard('admin')->check()) {

                $admin = Auth::guard('admin')->user();

                $admin->adminFcmTokens()->updateOrCreate(
                    ["fcm_token" => $fcm_token],
                    ["platform" => $platform],
                );


            } else if ($request->is('api/user/*') && Auth::guard('user')->check()) {

                $user = Auth::guard('user')->user();

                $user->userFcmTokens()->updateOrCreate(
                    ["fcm_token" => $fcm_token],
                    ["platform" => $platform],
                );
            }

        } catch (Exception $e) {
        }
        return $response;
    }
}
