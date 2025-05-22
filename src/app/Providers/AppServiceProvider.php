<?php

namespace App\Providers;

use App\Models\Producto;
use App\Models\Rol;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
/*         View::composer('dashboard', function ($view) {
            $view->with('productos', Producto::all());
        }); */
        View::composer('*', function ($view) {
        $view->with('usuario', Auth::user());
    });
    }
}
