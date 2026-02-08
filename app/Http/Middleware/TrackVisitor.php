<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        $alreadyVisited = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', Carbon::today())
            ->exists();

        if (!$alreadyVisited) {
            Visitor::create([
                'ip_address' => $ip,
                'visited_at' => Carbon::now()
            ]);
        }

        return $next($request);
    }
}
