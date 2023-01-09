<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Gate::define('view', function(User $user, $model){
//            return $user->hasAccess("view_{$model}") || $user->hasAccess("edit_{$model}");
//        });
//
//        Gate::define('edit', fn(User $user, $model) => $user->hasAccess("edit_{$model}"));
    }
}
