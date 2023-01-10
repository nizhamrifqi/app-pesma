<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\Student;
use Request;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
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
        $this->registerPolicies();

        Gate::define('SuperAdm', function ($admin) {
            return $admin->status == '1';
        });

        Gate::define('admin', function ($admin) {
            return $admin->status == 2;
        });

        Gate::define('security', function ($admin) {
            return $admin->status == 3;
        });
        
        Gate::define('student', function ($student) {
            return $student->ket == 1;
        });

    }
}
