<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OnlyAdminPermitted
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
        if($request->session()->get('role') !== 'admin') {
            $data = ['code' => 401, 'message' => 'Tidak Diizinkan'];
            return response()->view('whoops', $data);
        }

        return $next($request);
    }
}
