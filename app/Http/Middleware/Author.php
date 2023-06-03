<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Author
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            // $request->route()->getName() == 'api.v1.author.index' ||
            $request->user()->role == 1 ||  $request->user()->isAdmin
        ) {
            return $next($request);
        } else {
            abort(403, "Request not allowed");
        }
    }
}
