<?php

namespace App\Http\Middleware;

use App\Models\Section;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class FrontUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { if(empty(Session::has('frontSession'))){
        return redirect('/login');
    }
        return $next($request);
    }
}
