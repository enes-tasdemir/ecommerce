<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected $guards = [];

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;
        return parent::handle($request, $next, ...$guards);
    }

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if(in_array('admin',$this->guards)) return route('admin.login');
        }
    }
}
