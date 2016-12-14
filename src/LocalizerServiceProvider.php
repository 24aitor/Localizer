<?php

namespace Aitor24\Localizer;

use Aitor24\Laralang\LaralangServiceProvider;
use Illuminate\Support\ServiceProvider;
use Unicodeveloper\Identify\IdentifyServiceProvider;

class LocalizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->publishes([
            __DIR__.'/Config/localizer.php' => config_path('localizer.php'),
            __DIR__.'/Assets'               => public_path('vendor/Aitor24/Localizer'),
        ], 'localizer_pkg');

        $router->middleware('localizer', config('localizer.middleware'));
        $this->app->register(LaralangServiceProvider::class);
        $this->app->register(IdentifyServiceProvider::class);
        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/Aitor24/Localizer'),
        ], 'localizer_pkg');
        $this->loadViewsFrom(resource_path('views/vendor/Aitor24/Localizer'), 'localizer');

        $this->loadMigrationsFrom(__DIR__.'/Migrations', 'localizer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
