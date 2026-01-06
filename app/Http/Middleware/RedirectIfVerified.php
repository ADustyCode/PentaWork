<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfVerified
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard'); // redirect ke dashboard jika sudah verified
        }

        return $next($request);
    }
}
