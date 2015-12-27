<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Hoteru\Core;

class CheckForMaintenance
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
        if ($this->core->checkMaintenance())
        {
            $body = $this->core->getMaintenanceBody();
            return response()->view('errors.maintenance',compact('body'),503);
        }
        return $next($request);
    }
}
