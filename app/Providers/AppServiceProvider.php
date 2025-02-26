<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            $user = Auth::user();

            $canViewRolesAndPermissions = $user && ($user->hasRole('Admin') || $user->hasRole('Super Admin'));

            config([
                'filament-spatie-roles-permissions.should_register_on_navigation' => [
                    'permissions' => $canViewRolesAndPermissions,
                    'roles' => $canViewRolesAndPermissions,
                ],
            ]);
        });
    }
}
