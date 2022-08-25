<?php

namespace App\Http\Middleware;

use App\Models\Lecture;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LectureOwner
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
        $user = Auth::user();
        $lecture = Lecture::where('shug',request())
        if ($user ? $user->role : false )
        return $next($request);
    }
}
