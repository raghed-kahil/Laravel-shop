<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class verifyForms
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

        return $next($request);
    }
}
