<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() === null || $request->user()->employer === null) {
            return redirect()->route('employer.create')->with('error', 'You need to register as an employer first!');
        }

        return $next($request);
    }
}