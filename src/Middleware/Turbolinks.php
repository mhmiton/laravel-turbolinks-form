<?php

namespace Mhmiton\LaravelTurbolinksForm\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class Turbolinks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->header('turbolinks-form') && $request->expectsJson() && $response instanceof RedirectResponse) {
            $response->setContent($response->getTargetUrl());
            $response->setStatusCode(202);
            $response->header('turbolinks-form-validated', true);
        } else {
            $response->header('TurboLinks-Location', $request->fullUrl());
        }

        return $response;
    }
}
