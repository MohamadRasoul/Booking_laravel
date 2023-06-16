<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;

// class TransactionMiddleware extends Middleware
class TransactionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        DB::beginTransaction();
        $response = $next($request);
        // DB::rollBack();
        if (property_exists($response, 'exception')) {
            $response->exception instanceof \Throwable ? DB::rollBack() : DB::commit();
        }
        return $response;
    }
}
