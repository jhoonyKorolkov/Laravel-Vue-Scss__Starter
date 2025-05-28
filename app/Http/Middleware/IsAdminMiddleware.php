<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->is_admin) {
            return $next($request);
        }

        return response([
            'message' => 'You don\'t have permission to access this page.',
            'status' => Response::HTTP_FORBIDDEN,
        ]);
    }
}
