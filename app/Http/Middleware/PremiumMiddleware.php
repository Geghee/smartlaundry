<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PremiumMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if(Auth::user()->plan != 'premium') {

            return redirect('/dashboard')
                ->with(
                    'error',
                    'Fitur khusus premium'
                );

        }

        return $next($request);
    }
}