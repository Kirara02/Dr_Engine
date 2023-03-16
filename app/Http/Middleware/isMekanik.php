<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isMekanik
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
        if (auth()->user()->member->mekanik != null && auth()->user()->member->mekanik()->where('statusHapus','0')->first()->statusAktivasi == '1') {
            return $next($request);
        }

        return abort(403);
    }
}
