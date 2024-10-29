<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\PraktikanGroup;

class CheckUserGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = Auth::id();
        $requestedGroupId = $request->route('study_group');

        // Cek apakah user terdaftar di grup yang diminta
        $checkGroup = PraktikanGroup::where('user_id', $userId)
            ->where('course_id', $requestedGroupId)
            ->first();

        if (!$checkGroup) {
            // Jika user tidak terdaftar di grup ini, redirect atau abort dengan error
            abort(403);
        }

        return $next($request);
    }
}
