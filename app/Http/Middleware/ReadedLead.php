<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Lead\Repository\Model\Entities\Lead;

class ReadedLead
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
        $lead = Lead::findOrFail($request->id);
        $lead->is_readed = 1;
        $lead->save();
        return $next($request);
    }
}