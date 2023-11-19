<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdminOrOrganizer
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->hasAnyRole(['admin', 'organizer'])) {
            return $next($request);
        }

        return redirect('/')->with('error', "Vous n'êtes pas autorisé à accéder à cette page.");
    }
}
