<?php

namespace App\Http\Middleware;

use Closure;
use App\SiteSetting;

class CheckMaintainance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $status = SiteSetting::find(1)->status;
        if($status == 0){
            return redirect('under-maintainance');
        }
        return $next($request);
    }
}
