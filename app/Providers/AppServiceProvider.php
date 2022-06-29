<?php

namespace App\Providers;

use App\Repositories\MovementRepository;
use App\Repositories\MovementRepositoryImplementation;
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
        $this->app->bind(MovementRepository::class, function ($app) {
            return new MovementRepositoryImplementation();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
