<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\Student;

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
        //
        Schema::defaultStringLength(191);

        Gate::define('superadm', function (Admin $user){
            return view('login', $admin->status === '1');
        });
        Gate::define('admin', function (Admin $user){
            return $admin->status === '2';
        });
        Gate::define('security', function (Admin $user){
            return $admin->status === '3';
        });
    }
}
