<?php

namespace App\Http\Middleware;

use App\Models\Redirection;
use Closure;

class RedirectionMiddleware
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

        // $domain =$request->getHttpHost();
        // $currentUri = $request->getRequestUri();

        // $oldUrl = Redirection::where('request',$currentUri)->first();
        // if ($oldUrl) {
        //     dd($oldUrl->destination);
        //     return redirect($oldUrl->destination,301);
        // }
        return $next($request);
    }
}
