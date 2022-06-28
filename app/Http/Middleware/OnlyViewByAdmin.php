<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Support\Facades\URL;

class OnlyViewByAdmin
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

        if (Auth::check() && (Auth::user()->user_type == 'admin') && ((Auth::user()->email == "admin12345@gmail.com") || (Auth::user()->phone == "01814655030")))
        {
            // dd($request->method());
            $currentUrl=URL::current();
            $currentArrey=explode('/',$currentUrl);
            $delete = false;
            if(in_array('delete',$currentArrey)){
                $delete = true;
            }elseif(in_array('destroy',$currentArrey)){
                $delete= true;
            }elseif(in_array('order-purchase-added',$currentArrey)){
                $delete= true;
            }elseif(in_array('order-purchase-Paid',$currentArrey)){
                $delete= true;
            }elseif(in_array('order-sales-added',$currentArrey)){
                $delete= true;
            }elseif(in_array('order-sales-paid',$currentArrey)){
                $delete= true;
            }elseif(in_array('refresh-purchase',$currentArrey)){
                $delete= true;
            }

            if($request->ajax() ||
            $request->isMethod('post') ||
            $request->isMethod('delete') ||
            $request->isMethod('patch') ||
            $request->isMethod('put') ||
            $delete == true
            )
            {
                 return redirect('/admin_dashboard')->with('warning','You have no permission to control');
            }

            return $next($request);
        }
        else{
            return $next($request);
            // session(['link' => url()->current()]);
            // return redirect()->route('user.login');
        }
    }
}
