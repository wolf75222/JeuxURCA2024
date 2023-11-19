<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApplyThemeMiddleware
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

        // Appliquer le thème de la session à la vue
        if (session('theme') === 'dark') {
            $response->withCookie(cookie('theme', 'dark', 60)); // Expire dans 60 minutes
        } else {
            $response->withCookie(cookie('theme', 'light', 60)); // Expire dans 60 minutes
        }

        return $response;
    }
}

