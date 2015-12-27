<?php

namespace App\Http\Middleware;

use Closure;
use Hoteru\Core;

class Firewall
{
    protected $core;

    public function __construct(Core $core){
        $this->core = $core;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->core->isIpBlackListed($request->ip())){
            abort(403,'Sorry but your ip Banned');
        }
        return $next($request);
    }
}
