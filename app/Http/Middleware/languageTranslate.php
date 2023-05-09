<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;
use Session;

class languageTranslate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    } */

    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {

            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
