<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\StudentRepositoryInterface;
use App\Repositories\StudentRepositoryClass;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StudentRepositoryInterface::class, StudentRepositoryClass::class);
        
        // Alternatively, bind the repository using a unique string for facades
        $this->app->singleton('studentRepository', function($app) {
            return $app->make(StudentRepositoryClass::class);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}