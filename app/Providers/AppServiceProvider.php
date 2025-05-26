<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{

    public const HOME = '/dashboard';

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
        Route::middleware('web')
        ->group(function(){
            Route::get('/dashboard', function(){
                $role = auth()->user()->role;

                return match($role){
                    'admin' => redirect('/admin'),
                    'dokter' => redirect('/dokter'),
                    'kasir' => redirect('/kasir'),
                    'petugas' => redirect('/petugas'),
                    default => abort(403)
                };
            });
        });
    }
}
