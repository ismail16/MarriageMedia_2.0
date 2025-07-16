<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use App\Models;
use App\Models\Admin\Menu;
use App\Models\Admin\MenuBuilder;
use DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class GeneralMiddleware
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
        // if(file_exists(storage_path('installed'))){

        //     $sql = DB::Select(DB::raw('SHOW TABLES LIKE "menu_builders"'));
        //     if ($sql) {
        //         $header_menu = MenuBuilder::first();
        //         \View::share('header_menu', $header_menu);
        //     }

        // }    
        $user = Auth::guard('customer')->user();
        if ($user) {
            View::share('auth_user', $user);
        }

        return $next($request);
    }
}
