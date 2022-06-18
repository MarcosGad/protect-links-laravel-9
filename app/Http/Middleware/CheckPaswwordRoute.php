<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


class CheckPaswwordRoute
{
    
    public function handle(Request $request, Closure $next)
    {
        $user = User::find(auth()->user()->id);
        if($user->password_route == 0){
            //return  response('لا يمكن الدخول علي هذا الرابط');
            return redirect()->route('create.password');
        }

        return $next($request);
    }
}
