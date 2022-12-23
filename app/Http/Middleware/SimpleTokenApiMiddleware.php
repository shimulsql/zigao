<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class SimpleTokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $utoken = $request->header('x-token');
        $ptoken = $request->params('_token');

        if (
            !User::where('token', $utoken)->first() ||
            !User::where('token', $ptoken)->first()
        ) {
            return response()->json(['message' => 'Invalid Token'], 401);
        }
        return $next($request);
    }
}
