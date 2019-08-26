<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

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
        Resource::withoutWrapping();

        foreach ($this->models() as $model){
            $this->app->bind(
                "App\\Repositories\\$model\\$model" . "Interface",
                "App\\Repositories\\$model\\$model" . "Repository"
            );
        }
    }

    /**
     * Create array of models with repositories and interfaces
     *
     * @return array
     */
    public function models ()
    {
        return [
            'Department',
            'Guest',
            'Staff'
        ];
    }
}
