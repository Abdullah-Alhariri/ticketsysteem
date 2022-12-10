<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            if ( $user->hasRole('ROLE_ADMIN') ) {
                return redirect(route('home'));
            }

            else if ( $user->hasRole('ROLE_USER') ) {
                return $next($request);
            }
        }

        abort(403);  // permission denied error
    }
}
