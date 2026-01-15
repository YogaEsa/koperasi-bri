<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckMenuAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Superadmin bypass
        if ($user->role->name === 'superadmin') {
            return $next($request);
        }

        $currentRoute = Route::currentRouteName();
        // Extract base feature name (e.g., 'loans.create' -> 'loans')
        $baseRoute = explode('.', $currentRoute)[0];

        // Map base routes to main menu route keys if necessary
        // Assuming conventions: 'loans.*' -> 'loans.index'
        $menuRouteToCheck = $baseRoute . '.index';

        // Handle Exceptions / Special Cases
        if ($currentRoute === 'dashboard') {
            $menuRouteToCheck = 'dashboard';
        }

        // Find the menu that corresponds to this feature
        $menu = Menu::where('route', $menuRouteToCheck)->first();

        // If the route corresponds to a controlled menu
        if ($menu) {
            // Check if user has this menu assigned
            if (!$user->role->menus->contains($menu->id)) {
                abort(403, 'Anda tidak memiliki hak akses ke menu ini.');
            }
        }

        return $next($request);
    }
}
