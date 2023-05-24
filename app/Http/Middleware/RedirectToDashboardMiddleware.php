<?php

namespace App\Http\Middleware;

use App\Models\Enums\UserTypes;
use Closure;
use Illuminate\Http\Request;

class RedirectToDashboardMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return match ($request->user()->type) {
            UserTypes::Receptionist->value=>redirect()->route('receptionist.dashboard'),
            UserTypes::Doctor->value=>redirect()->route('doctor.dashboard'),
            UserTypes::LabTech->value=>redirect()->route('labtech.dashboard'),
            default=>$next($request)
        };
    }
}
